<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Affiche la page d'édition du profil.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Met à jour le profil de l'utilisateur.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        dd($user);

    
        // Mise à jour des autres champs du profil
        $user->fill($request->validated());
    
        // Vérifie si l'email a changé et réinitialise la vérification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        // 🚀 Vérification et mise à jour de l'avatar SEULEMENT si un fichier est uploadé
        if ($request->hasFile('avatar')) {
            $newAvatar = $request->file('avatar');
    
            // Vérifier si le fichier est valide
            if ($newAvatar->isValid()) {
                // Supprimer l'ancien avatar seulement s'il existe et est différent du nouveau
                if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                    Storage::delete('public/' . $user->avatar);
                }
    
                // Stocker la nouvelle image et mettre à jour le chemin
                $avatarPath = $newAvatar->store('avatars', 'public');
                $user->avatar = $avatarPath;
            }
        }
    
        //  Vérifie si des changements ont été effectués avant de sauvegarder
        if ($user->isDirty()) {
            dd(Auth::user());

            $user->save();
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } else {
            return Redirect::route('profile.edit')->with('status', 'Aucune modification détectée.');
        }
    }
    
    

    /**
     * Supprime le compte utilisateur.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}


