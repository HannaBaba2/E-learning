<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModificationPage</title>
</head>
<body>
    
    <div class="container">
        <h1>Modifier le cours</h1>

        <form action="{{ route('cours.update', $cour->cour_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" value="{{ old('titre', $cour->titre) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description', $cour->description) }}" required>
            </div>

            <div class="form-group">
                <label for="fichier">Fichier du Cours</label>
                <input type="file" name="fichier" id="fichier">
                <!-- @if($cour->fichier)
                    <p>Fichier actuel : <a href="{{ asset('storage/' . $cour->fichier) }}" target="_blank">Télécharger</a></p>
                @endif -->
            </div>

                <!-- <textarea name="fichier" id="fichier"  required>{{ old('fichier', $cour->fichier) }}</textarea> -->
            

            <!-- <div class="form-group">
                <label for="enseignant_id">Enseignant</label>
                <select name="enseignant_id" id="enseignant_id" class="form-control" required>
                    @foreach($enseignants as $enseignant)
                        <option value="{{ $enseignant->enseignant_id }}" {{ old('enseignant_id') == $enseignant->enseignant_id ? 'selected' : '' }}>
        {{ $enseignant->nom }}
    </option>

                    @endforeach
                </select>
            </div> -->

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</body>
</html>