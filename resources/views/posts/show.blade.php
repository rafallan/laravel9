@extends('home')

@section('conteudo')

<a href="{{ route('posts.index') }}" class="btn btn-dark">Voltar</a>

<p>{{ $post->titulo }}</p>

<p>{{ $post->conteudo }}</p>

<br>
<br>

<p>Autor: {{ $post->user->name }}</p>

@endsection