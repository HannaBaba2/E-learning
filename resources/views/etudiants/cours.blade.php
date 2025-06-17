<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cours de l'étudiant</title>
</head>
<body>
    <h1>Liste des cours inscrits de {{ $etudiant->prenom }} {{ $etudiant->nom }}</h1>

    @if($etudiant->cours->isEmpty())
        <p>L'étudiant n'est inscrit à aucun cours.</p>
    @else
        <ul>
            @foreach($etudiant->cours as $cours)
                <li>
                    <strong>{{ $cours->titre }}</strong><br>
                    {{ $cours->description }}<br>
                    Paiement : {{ $cours->pivot->paiement ?? 'Non précisé' }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
