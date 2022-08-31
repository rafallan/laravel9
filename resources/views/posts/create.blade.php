@extends('home')

@section('conteudo')
    <div class="container">

        <form method="POST"
              action="{{ route('posts.store') }}">
            @csrf
            <div class="mb-3">
                <label for="titulo"
                       class="form-label">Título do Post</label>
                <input type="text"
                       class="form-control"
                       id="titulo"
                       name="titulo"
                       placeholder="Digite o título do post">
                <small class="text-danger">{{ $errors->first('titulo') }}</small>
            </div>

            <div class="mb-3">
                <label for="conteudo"
                       class="form-label">Conteúdo do Post</label>
                <textarea class="form-control"
                          id="conteudo"
                          name="conteudo"
                          placeholder="Digite aqui o conteúdo..."
                          rows="10"></textarea>
                <small class="text-danger">{{ $errors->first('conteudo') }}</small>
            </div>

            <input type="hidden" name="user_id" value="1">

            <div class="">
                <button type="submit"
                        class="btn btn-primary">Cadastrar Post</button>
            </div>
        </form>
    </div>
@endsection
