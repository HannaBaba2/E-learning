<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormulairePage</title>
</head>
<body>
    <div class="container">
        <h2>Liste des Enseignants</h2>
        <a href="{{route('enseignants.create')}}">

            <button class="btn btn-neutral">
                Ajouter Un Enseignant   
            </button>
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Spécialité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enseignants as $enseignant)
                    <tr>
                        <td>{{ $enseignant->nom }}</td>
                        <td>{{ $enseignant->prenom }}</td>
                        <td>{{ $enseignant->dateNaissance}}</td>
                        <td>{{ $enseignant->telephone }}</td>
                        <td>{{ $enseignant->email }}</td>
                        <td>{{ $enseignant->specialite }}</td>
                        <td>
                            <a href="{{ route('enseignants.show', $enseignant->enseignant_id) }}" class="btn btn-info btn-sm">Afficher</a>
                            <a href="{{ route('enseignants.edit', $enseignant->enseignant_id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('enseignants.destroy', $enseignant->enseignant_id) }}" method="POST" style="display:inline;">
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
        {{$enseignants->links()}}        
    </div>

</body>
</html>