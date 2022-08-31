@extends('home')

@section('conteudo')
<h1>Aqui a começa a sessão conteudo</h1>

@foreach ($posts as $post)
    <h1>{{ $post->titulo }}</h1>
    <p>{{ $post->conteudo }}</p>
    <p>{{ date('d/m/Y H:i:s',strtotime($post->created_at)) }}</p>
@endforeach
@endsection
99860116 williams

98415-2029  Rafael