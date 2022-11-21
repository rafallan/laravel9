@extends('home')

@section('conteudo')

<h2>{{ $post->titulo }}</h2>

@if ($post->imagem)
    <img src="{{ asset('storage/'. $post->imagem) }}" alt="Imagem do Post">
@endif

<p>{{ $post->conteudo }}</p>

<br>
<br>

<p>Autor: {{ $post->user->name }}</p>

<a href="{{ route('posts.index') }}" class="btn btn-dark">Voltar</a>

@endsection