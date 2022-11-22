@extends('template')

@section('conteudo')
    <div class="container">

        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título do Post</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do post"
                    value="{{ $post->titulo }}">
                <small class="text-danger">{{ $errors->first('titulo') }}</small>
            </div>

            <div class="mb-3">
                <label for="conteudo" class="form-label">Conteúdo do Post</label>
                <textarea class="form-control" id="conteudo" name="conteudo" placeholder="Digite aqui o conteúdo..." rows="10">{{ $post->conteudo }}</textarea>
                <small class="text-danger">{{ $errors->first('conteudo') }}</small>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
                <small class="text-danger">{{ $errors->first('imagem') }}</small>
            </div>

            <div class="">
                <button type="submit" class="btn btn-success">Editar Post</button>

                <a href="{{ route('posts.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
