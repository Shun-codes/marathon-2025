<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Page d’accueil : 3 articles les plus récents
     */
    public function home()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('welcome', compact('articles'));
    }

    public function index()
    {
        $articles = Article::with(['editeur', 'rythme', 'accessibilite', 'conclusion'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('articles.liste-article', compact('articles'));
    }

    /**
     * Page d’un article : détails + incrémentation des vues
     */
    public function show($id)
    {
        $article = Article::with([
            'editeur',
            'avis.user',
            'likes',
            'rythme',
            'accessibilite',
            'conclusion'
        ])->findOrFail($id);

        $article->increment('nb_vues');

        return view('articles.show', compact('article'));
    }

    /**
     * Liste des articles par rythme
     */
    public function byRythme($id)
    {
        $articles = Article::where('rythme_id', $id)
            ->with('rythme')
            ->get();

        return view('articles.card-article', compact('articles'));
    }
}
