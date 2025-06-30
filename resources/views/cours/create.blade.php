<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoursPage</title>
</head>
<body>
    <div class="container">
        <h2>Créer un nouveau cours</h2>
        <form action="{{ route('cours.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre du cours</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}" required>
                @error('titre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- <div class="form-group">
                <label for="enseignant_id">Enseignant</label>
                <select name="enseignant_id" id="enseignant_id" class="form-control" required>
                    <option value="">-- Choisir un enseignant --</option>
                    @foreach($enseignants as $enseignant)
                        <option value="{{ $enseignant->enseignant_id }}" {{ old('enseignant_id') == $enseignant->enseignant_id ? 'selected' : '' }}>
        {{ $enseignant->nom }}
        </option>

                    @endforeach
                </select>
        </div> -->

            <div class="mb-3">
                <label for="fichier" class="form-label">Fichier du cours (PDF, vidéo, etc.)</label>
                <input type="file" class="form-control" id="fichier" name="fichier">
                @error('fichier')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('cours.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>