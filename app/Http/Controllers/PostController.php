<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $nome = "Rafael";
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('posts.post', ['nome' => $nome, 'posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {

        $dados = [
            'titulo' => $request->titulo,
            'conteudo' => $request->input('conteudo'),
            'user_id' => Auth::user()->id,
        ];

        if ($request->imagem) {

            $dados['imagem'] = $request->imagem->store('imagens');
        }

        $cadastrar = Post::create($dados);

        if ($cadastrar) {
            return redirect()->route('posts.index')
            ->with('mensagem', 'Cadastro realizado com sucesso!!!');
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $data = $request->except(['_token', '_method']);

        if ($request->imagem) {
            if (Storage::exists($post->imagem)) {
                Storage::delete($post->imagem);
            }

            $data['imagem'] = $request->imagem->store('imagens');
        }

        $atualizado = Post::where('id', $id)->update($data);

        if ($atualizado) {
            return redirect()->route('posts.index')
            ->with('mensagem', 'Cadastro atualizado com sucesso!!!');
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->imagem) {
            Storage::delete($post->imagem);
        }
        $deletado = $post->delete();

        if ($deletado) {
            return redirect()->route('posts.index');
        }
    }
}
