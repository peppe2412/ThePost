<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unserevisorArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $refuseArticles = Article::where('is_accepted', false)->get();
        return view('revisor.dashboard', compact('unserevisorArticles', 'acceptedArticles', 'refuseArticles'));
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
