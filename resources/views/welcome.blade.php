@extends('layouts.app')

@section('title', 'Bienvenue sur Laravel')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h1>Bienvenue sur Laravel</h1>
                </div>
                <div class="card-body">
                    <p class="lead">Voici votre page d'accueil Laravel. Vous pouvez commencer à personnaliser cette page en fonction de vos besoins !</p>

                    <!-- Exemple d'un bouton -->
                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">Se connecter</a>
                    </div>

                    <!-- Exemple d'un autre bouton -->
                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="btn btn-secondary w-100">S'inscrire</a>
                    </div>
                </div>
            </div>

            <!-- Section Footer -->
            <div class="text-center mt-4">
                <p>&copy; {{ date('Y') }} Mon Application Laravel. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</div>
@endsection

