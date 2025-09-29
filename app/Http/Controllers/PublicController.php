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
        $articles = Article::where('is_accepted', true)->orderBy('created_at','desc')->take(4)->get();
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
        $email = $request->email;
        $message = $request->message;
        $info = compact('role', 'email', 'message');

        Mail::to('admin@mail.com')->send(new CareersRequestMail($info));

        switch ($role){
            case 'admin':
                $user->is_admin = NULL;
            break;
            case 'revisor':
                $user->is_revisor = NULL;
            break;
            case 'writer':
                $user->is_writer = NULL;
            break;
        } 

        $user->update();
        return redirect(route('home'))->with('message', 'Richiesta inviata');

    }
}
