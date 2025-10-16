<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareersRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['home'])
        ];
    }

    public function home()
    {
        $title = 'Home';
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles', 'title'));
    }

    public function careers()
    {
        $title = 'Lavora con noi';
        return view('careers', compact('title'));
    }

    public function careersSubmit(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'role' => 'required',
            'message' => 'required'
        ], [
            'email.required' => 'Campo richiesto',
            'role.required' => 'Campo richiesto',
            'message.required' => 'Campo richiesto',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $info = [
            'role' => $role,
            'email' => $request->email,
            'message' => $request->message,
            'user_name' => $user->name
        ];

        Mail::to('admin@mail.com')->send(new CareersRequestMail($info));

        switch ($role) {
            case 'admin':
                $user->update([
                    'is_admin' => false,
                    'admin_request_at' => now()
                ]);
                break;
            case 'revisor':
                $user->update([
                    'is_revisor' => false,
                    'revisor_request_at' => now()
                ]);
                break;
            case 'writer':
                $user->update([
                    'is_writer' => false,
                    'writer_request_at' => now()
                ]);
                break;
        }

        return redirect(route('home'))->with('message', 'Richiesta inviata');
    }
}
