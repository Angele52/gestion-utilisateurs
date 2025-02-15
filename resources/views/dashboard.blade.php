<!-- {{-- resources/views/dashboard.blade.php --}} -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <!-- Inclus Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @if(auth()->check())  <!-- Vérifie si l'utilisateur est connecté -->
            <h1>Bienvenue, {{ auth()->user()->name }} !</h1>
        @else  <!-- Si l'utilisateur n'est pas connecté -->
            <h1>Veuillez vous connecter.</h1>
        @endif

        <!-- Ajout d'un bouton de déconnexion -->
        @if(auth()->check())  <!-- Si l'utilisateur est connecté -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger mt-3">Se déconnecter</button>
            </form>
        @endif
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


