<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Http\Responses\LogoutResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(RegisterResponse::class, function(){
            return new class implements RegisterResponse{
                public function toResponse($request)
                {
                    if($request->user()->hasVerifiedEmail()){
                        return redirect()->intended('/');
                    }else{
                        return redirect(route('verification.notice'));
                    }
                }
            };
        });

        $this->app->singleton(LogoutResponse::class, function(){
            return new class extends LogoutResponse{
                public function toResponse($request){
                    return redirect('/?logout=1');
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
            $title = 'Login';
            return view('auth.login', compact('title'));
        });

        Fortify::registerView(function () {
            $title = 'Registrazione';
            return view('auth.register', compact('title'));
        });

        Fortify::verifyEmailView(function () {
            if(auth()->check() && auth()->user()->hasVerifiedEmail()){
                return redirect('/?verified=1');
            }
            $title = 'Verifica email';
            return view('auth.verify-email', compact('title'));
        });

        Fortify::requestPasswordResetLinkView(function () {
            $title = 'Richiesta reset password';
            return view('auth.forgot-password', compact('title'));
        });

        Fortify::resetPasswordView(function (Request $request) {
            $title = 'Nuova password';
            return view('auth.reset-password', ['request' => $request], ['title' => $title]);
        });
    }
}
