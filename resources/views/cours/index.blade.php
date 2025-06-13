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
    <a href="{{route('cours.create')}}" class="btn btn-primary mb-3">Ajouter un cours</a>

    <!-- Message de succès (à afficher dynamiquement si besoin) -->
    <!-- <div class="alert alert-success">Cours ajouté avec succès.</div> -->

    <!-- Si aucun cours -->
    <!-- <p>Aucun cours disponible.</p> -->

    <!-- Exemple de table de cours -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cours as $cour)
            <tr>
                <td>{{$cour->titre}}</td>
                <td>{{$cour->description}}</td>
                <td>{{$cour->author}}</td>
                <td>
                    <a href="{{route('cours.show',$cour->cour_id)}}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{route('cours.edit',$cour->cour_id)}}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{route('cours.destroy',$cour->cour_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce cours ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td>Oups ! no lesson.</td>
                </tr>
            @endforelse
            <!-- Ajoutez d'autres lignes de cours ici -->
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