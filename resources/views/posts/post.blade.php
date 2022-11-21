@extends('home')

@section('conteudo')
    <h1>Aqui a começa a sessão conteudo</h1>           

    @if (Session::has('mensagem'))
        <div class="alert alert-success">
            {{ Session::get('mensagem') }}
        </div>
    @endif

    <a href="{{ route('posts.create') }}"
       class="btn btn-success mb-3" title="Cadastrar Novo Post"><i class="bi bi-plus-square"></i></a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Conteúdo</th>
                <th>Autor</th>
                <th>Data Publicação</th>
                <th colspan="3" class="text-center">Ações</th>
            </tr>
        </thead>

        <tbody>
            @php
                $i = 0;
            @endphp

            @foreach ($posts as $post)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->conteudo }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($post->created_at)) }}</td>
                    <td class="text-center">
                        <form action="{{ route('posts.destroy', $post) }}"
                              method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                    value="Excluir"
                                    title="Excluir"
                                    onclick="return confirm('Você deseja excluir o post?')"
                                    class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('posts.edit', $post) }}"
                           class="btn btn-sm btn-warning"
                           title="Editar"><i class="bi bi-pencil-square"></i></a>
                    </td>

                    <td class="text-center">
                        <a href="{{ route('posts.show', $post) }}"
                           class="btn btn-sm btn-primary"
                           title="Editar"><i class="bi bi-eye-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
