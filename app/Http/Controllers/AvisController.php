<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
    /**
     * Enregistrer un nouveau commentaire.
     */
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'contenu' => 'required|string|max:1000',
        ]);

        Avis::create([
            'contenu' => $request->contenu,
            'article_id' => $article->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Commentaire ajouté avec succès !');
    }

    /**
     * Supprimer un commentaire (seulement par son auteur ou un admin).
     */
    public function destroy(Avis $avis)
    {
        if ($avis->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }
        $avis->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé.');
    }
}