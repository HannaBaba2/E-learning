@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Bonjour {{ Auth::user()->prenom }}</h2>
        <a href="{{ route('enseignant.ajouter') }}">Ajouter un cours</a>
        <h3>Mes cours :</h3>
        <ul>
            @foreach($cours as $c)
                <li><strong>{{ $c->titre }}</strong> - {{ $c->description }}</li>
            @endforeach
        </ul>
    </div>
@endsection
