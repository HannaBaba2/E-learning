<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur notre plateforme E-learning</h1>
        <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
        <p>S'inscrire En tant Qu'</p>
        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Étudiants</a>
        <a href="{{ route('enseignants.create') }}" class="btn btn-secondary">Enseignants</a>
        <br><br>
    </div>
</body
