<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord etudiant</title>
</head>
<body>
    <div class="container">
        <h2>Tableau de bord Étudiant</h2>
        <div class="list-group">
            <a href="{{ route('cours.create') }}" class="list-group-item list-group-item-action">
                Cree Un Cour
            </a></br>
            <a href="{{ route('etudiants.index') }}" class="list-group-item list-group-item-action">
                Liste des étudiants
            </a></br>
            
        </div>
    </div>

</body>
</html>