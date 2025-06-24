<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisionedArticles = Article::where('is_accepted', NULL)->orderBy('created_at', 'desc')->get();
        $acceptedArticles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        $rejectedArticles = Article::where('is_accepted', false)->orderBy('created_at', 'desc')->get();

        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    // NUOVO METODO: Accetta un articolo
    public function acceptArticle(Article $article)
    {
        $article->update(['is_accepted' => true]);
        return redirect(route('revisor.dashboard'))->with('message', "Hai accettato l'articolo '{$article->title}'.");
    }

    // NUOVO METODO: Rifiuta un articolo
    public function rejectArticle(Article $article)
    {
        $article->update(['is_accepted' => false]);
        return redirect(route('revisor.dashboard'))->with('message', "Hai rifiutato l'articolo '{$article->title}'.");
    }

    // NUOVO METODO: Annulla la revisione e rimette l'articolo in attesa
    public function undoArticle(Article $article)
    {
        $article->update(['is_accepted' => null]);
        return redirect(route('revisor.dashboard'))->with('message', "L'articolo '{$article->title}' è stato rimesso in revisione.");
    }
}

