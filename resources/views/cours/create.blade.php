
<div class="container">
    <h1>Créer un nouveau cours</h1>

    <form action="{{ route('cours.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="enseignant_id">Enseignant</label>
            <select name="enseignant_id" id="enseignant_id" class="form-control" required>
                <option value="">-- Choisir un enseignant --</option>
                @foreach($enseignants as $enseignant)
                    <option value="{{ $enseignant->enseignant_id }}" {{ old('enseignant_id') == $enseignant->enseignant_id ? 'selected' : '' }}>
    {{ $enseignant->nom }}
</option>

                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
