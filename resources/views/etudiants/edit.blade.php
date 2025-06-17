<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ValidationPage</title>
</head>
<body>
    <div class="container">
        <h2>Modifier Etudiant</h2>
        <form action="{{ route('etudiants.update', $etudiant->etudiant) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $etudiant->nom) }}" required>
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $etudiant->prenom) }}" required>
                @error('prenom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="dateNaissance">Date de Naissance</label>
                <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" value="{{ old('dateNaissance', $etudiant->dateNaissance->format('Y-m-d')) }}" required>
                @error('dateNaissance')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $etudiant->telephone) }}" required>
                @error('telephone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $etudiant->adresse) }}" required>
                @error('adresse')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $etudiant->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="niveau">Niveau</label>
                <input type="text" class="form-control" id="niveau" name="niveau" value="{{ old('niveau', $etudiant->niveau) }}">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

</body>
</html>