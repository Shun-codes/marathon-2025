<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, Article $article)
    {
        $user = $request->user();
        $existing = $article->likes()->where('user_id', $user->id)->first();

        if ($existing) {
            $nature = $existing->pivot->nature;

            if ($nature === true || $nature === 1 || $nature === "1") {
                // Déjà liké → retour à null (aucun avis)
                $article->likes()->updateExistingPivot($user->id, ['nature' => null]);
            } else {
                // Était en dislike ou null → like
                $article->likes()->updateExistingPivot($user->id, ['nature' => true]);
            }
        } else {
            // Aucune relation → créer un like
            $article->likes()->attach($user->id, ['nature' => true]);
        }

        return back();
    }

    public function dislike(Request $request, Article $article)
    {
        $user = $request->user();
        $existing = $article->likes()->where('user_id', $user->id)->first();

        if ($existing) {
            $nature = $existing->pivot->nature;

            if ($nature === false || $nature === 0 || $nature === "0") {
                // Déjà en dislike → retour à null (aucun avis)
                $article->likes()->updateExistingPivot($user->id, ['nature' => null]);
            } else {
                // Était en like ou null → dislike
                $article->likes()->updateExistingPivot($user->id, ['nature' => false]);
            }
        } else {
            // Aucune relation → créer un dislike
            $article->likes()->attach($user->id, ['nature' => false]);
        }

        return back();
    }
}