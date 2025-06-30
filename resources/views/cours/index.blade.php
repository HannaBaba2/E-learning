<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des cours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Liste des cours</h1>
    <a href="{{ route('cours.create') }}" class="">Ajouter un cours</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <!-- <th>Description</th> -->
                <th>Auteur</th>
                <!-- <th>Fichier</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cours as $cour)
            <tr>
                <td>{{ $cour->titre }}</td>
                <!-- <td>{{ $cour->description }}</td> -->
               <td>{{ $cour->enseignant->user->nom ?? 'Inconnu' }}</td>
                <!-- <td>
                    @if($cour->fichier)
                    <a href="{{ asset('storage/' . $cour->fichier) }}" class="btn btn-link">Télécharger</a> 
                    @else
                        Pas de fichier disponible
                    @endif -->
                </td> 
                <td>
                    <div class="flex space-x-2">
                        <button><a href="{{ route('cours.show', $cour->cour_id) }}" class="">Suivre Un Cours</a></button>
                        <button><a href="{{ route('cours.edit', $cour->cour_id) }}" class="">Modifier</a></button>
                        
                        <form action="{{ route('cours.destroy', $cour->cour_id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="" onclick="return confirm('Supprimer ce cours ?')">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">Oups ! Aucun cours disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination (à adapter dynamiquement si besoin) -->
    <!-- <nav>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
        </ul>
    </nav> -->
</div>
</body>
</html>
