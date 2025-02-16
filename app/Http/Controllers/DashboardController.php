<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    // Méthode pour afficher le tableau de bord
    public function index()
    {  
        // Vérifie si l'utilisateur est authentifié
        if (!auth::check()) {
            // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
            return redirect()->route('login');
        }

        // Récupère les informations de l'utilisateur connecté
        $user = auth::user();

        // Retourne la vue avec les informations de l'utilisateur
        return view('dashboard', compact('user'));
    }
}

