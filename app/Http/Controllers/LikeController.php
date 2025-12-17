<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $user = $request->user();

        if (!$user) {
            return back()->with('error', 'Vous devez être connecté pour liker.');
        }

        $existing = $article->likes()->where('user_id', $user->id)->first();

        if ($existing) {
            // Toggle : inverse la valeur
            $article->likes()->updateExistingPivot($user->id, [
                'nature' => !$existing->pivot->nature
            ]);
        } else {
            // Nouveau enregistrement → nature = true
            $article->likes()->attach($user->id, ['nature' => true]);
        }

        return back();
    }
}
