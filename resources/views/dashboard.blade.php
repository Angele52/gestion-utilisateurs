@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Tableau de Bord</h2>
        <p class="text-center">Bienvenue, {{ Auth::user()->name }} !</p>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Gestion du Profil</h5>
                        <p class="card-text">Mettez à jour vos informations personnelles et votre avatar.</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier le Profil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Statistiques</h5>
                        <p class="card-text">Consultez vos dernières activités sur la plateforme.</p>
                        <a href="#" class="btn btn-secondary">Voir les statistiques</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
