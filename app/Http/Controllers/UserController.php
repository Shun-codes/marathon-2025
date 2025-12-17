<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('profil.show', [
            'utilisateur' => $user
        ]);
    }
    public function edit()
    {
        $utilisateur = Auth::user();
        return view('profil.edit', compact('utilisateur'));
    }

    public function suivre($id)
    {
        $utilisateurASuivre = User::findOrFail($id);
        $moi = auth()->user();
        $moi->suivis()->toggle($utilisateurASuivre->id);
        return back();
    }

    public function voirProfilPublic($id)
    {
        $utilisateur = User::with(['mesArticles', 'suiveurs', 'suivis', 'likes'])->findOrFail($id);
        return view('profil.user', [
            'utilisateur' => $utilisateur
        ]);
    }

    public function toggleSuivi($id)
    {
        $userToFollow = User::findOrFail($id);
        $me = auth()->user();
        $me->suivis()->toggle($userToFollow->id);
        return back();
    }
}