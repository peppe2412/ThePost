<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function dashboard()
    {
        $title = 'Writer';
        $acceptArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        $rejectArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted', false)->orderBy('created_at', 'desc')->get();
        $unrevisorArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted', NULL)->orderBy('created_at', 'desc')->get();

        return view('writer.dashboard', compact('acceptArticles', 'rejectArticles', 'unrevisorArticles', 'title'));
    }
}
