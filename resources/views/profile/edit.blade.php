@extends('layouts.app')

@section('title', 'Modifier le Profil')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Modifier le Profil</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')

                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Avatar -->
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input type="file" id="avatar" name="avatar" class="form-control">
                                @error('avatar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                @if (Auth::user()->avatar)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle border" width="100" height="100" alt="Avatar">
                                    </div>
                                @endif
                            </div>

                            <!-- Nouveau Mot de Passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Nouveau Mot de Passe (laisser vide pour ne pas modifier)</label>
                                <input type="password" id="password" name="password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmation du Mot de Passe -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmer le Mot de Passe</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                @if ($errors->has('password') || $errors->has('password_confirmation'))
                                    <div class="text-danger">Les mots de passe ne correspondent pas.</div>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

