<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisorArticles = Article::where('is_accepted', NULL)->get();
        $acceptArticles = Article::where('is_accepted', true)->get();
        $rejectArticles = Article::where('is_accepted', false)->get();
        return view('revisor.dashboard', compact('unrevisorArticles', 'acceptArticles', 'rejectArticles'));
    }

    public function articleAccept(Article $article)
    {
        $article->is_accepted = true;
        $article->save();
        return redirect(route('revisor-dashboard'))->with('message', 'Articolo accettato');
    }

    public function articleReject(Article $article)
    {
        $article->is_accepted = false;
        $article->save();
        return redirect(route('revisor-dashboard'))->with('message', 'Articolo rifiutato');
    }

    public function articleUndo(Article $article)
    {
        $article->is_accepted = NULL;
        $article->save();
        return redirect(route('revisor-dashboard'))->with('message', 'Articolo mandato in revisione');
    }
}
