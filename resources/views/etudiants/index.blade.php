<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des Étudiants</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('etudiants.create') }}" class="">Ajouter un étudiant</a>

        <div>
            <table class="table table-bordered">
                <thead class="">
                    
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $etudiant->user->nom }}</td>
                        <td>{{ $etudiant->user->prenom }}</td>
                        <td>{{ $etudiant->user->dateNaissance }}</td>
                        <td>{{ $etudiant->user->telephone }}</td>
                        <td>{{ $etudiant->user->email }}</td>
                        <td>{{ $etudiant->niveau }}</td>
                        <td>
                            <a href="{{ route('etudiants.show', $etudiant->etudiant_id) }}" class="">Afficher</a>
                            <a href="{{ route('etudiants.edit', $etudiant->etudiant_id) }}" class="">Modifier</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->etudiant_id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($etudiants->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">Aucun étudiant trouvé.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $etudiants->links() }}
    </div>
</div>
</body>
</html>
