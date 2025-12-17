<?php

namespace App\Http\Controllers;

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
}