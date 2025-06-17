<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormulairePage</title>
</head>
<body>
    <div class="container">
        <h2>Liste des Etudiants</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->dateNaissance}}</td>
                        <td>{{ $etudiant->telephone }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{ $etudiant->niveau }}</td>
                        <td>
                            <a href="{{ route('etudiants.show', $etudiant->etudiant_id) }}" class="btn btn-info btn-sm">Afficher</a>
                            <a href="{{ route('etudiants.edit', $etudiant->etudiant_id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->etudiant_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{$etudiants->links()}}        
    </div>

</body>
</html>