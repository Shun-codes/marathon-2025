<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Rythme;
use App\Models\Accessibilite;
use App\Models\Conclusion;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * Liste des articles
     */
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
     * Formulaire de création d’un article
     */
    public function create()
    {
        $rythmes = Rythme::all();
        $accessibilites = Accessibilite::all();
        $conclusions = Conclusion::all();

        return view('articles.create-article', compact('rythmes', 'accessibilites', 'conclusions'));
    }

    /**
     * Enregistrement d’un nouvel article
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string',
            'texte' => 'required|string',
            'image' => 'required|string',
            'media' => 'required|string',
            'rythme_id' => 'required|exists:rythmes,id',
            'accessibilite_id' => 'required|exists:accessibilites,id',
            'conclusion_id' => 'required|exists:conclusions,id',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['en_ligne'] = false;
        //article hors ligne par défaut
        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès !');
    }

    public function edit(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Vous n’êtes pas autorisé à modifier cet article.');
        }

        $rythmes = Rythme::all();
        $accessibilites = Accessibilite::all();
        $conclusions = Conclusion::all();

        return view('articles.edit-article', compact('article', 'rythmes', 'accessibilites', 'conclusions'));
    }

    public function update(Request $request, Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Vous n’êtes pas autorisé à modifier cet article.');
        }

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string',
            'texte' => 'required|string',
            'image' => 'required|string',
            'media' => 'required|string',
            'rythme_id' => 'required|exists:rythmes,id',
            'accessibilite_id' => 'required|exists:accessibilites,id',
            'conclusion_id' => 'required|exists:conclusions,id',
        ]);

        $article->update($validated);

        return redirect()->route('articles.show', $article->id)
            ->with('success', 'Article mis à jour avec succès !');
    }
    public function destroy(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Vous n’êtes pas autorisé à supprimer cet article.');
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article supprimé avec succès.');
    }


    /**
     * Page d’accueil : 3 articles les plus récents
     */
    public function home()
    {
        $query = Article::orderBy('created_at', 'desc');

        if (auth()->check()) {
            $query->where(function ($q) {
                $q->where('en_ligne', true)
                    ->orWhere('user_id', auth()->id());
            });
        } else {
            $query->where('en_ligne', true);
        }

        $articles = $query->take(3)->get();

        return view('statiques.welcome', compact('articles'));
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

    public function toggle(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Vous n’êtes pas autorisé à modifier cet article.');
        }

        $article->en_ligne = !$article->en_ligne;
        $article->save();

        return back()->with('success', 'Statut de l’article mis à jour.');
    }

}
