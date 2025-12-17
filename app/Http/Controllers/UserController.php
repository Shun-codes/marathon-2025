<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

    public function update(Request $request)
    {
        $utilisateur = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048|dimensions:max_width=512,max_height=512',        ]);
        $utilisateur->name = $request->name;
        if ($request->hasFile('avatar')) {

            if ($utilisateur->getRawOriginal('avatar')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $utilisateur->getRawOriginal('avatar')));
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $utilisateur->avatar = '/storage/' . $path;
        }
        $utilisateur->save();
        return redirect()->route('profil.show')->with('success', 'Profil mis à jour avec succès !');
    }
}