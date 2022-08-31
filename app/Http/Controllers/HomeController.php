<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nome = "Rafael";
        $posts = Post::paginate(5);
        return view('posts.post', ['nome' => $nome, 'posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {

        $cadastrar = Post::create($request->all());

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
       //dd($request->except(['_token', '_method']));
        $atualizado = Post::where('id', $id)->update($request->except(['_token', '_method']));

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
        $deletado = $post->delete();

        if ($deletado) {
            return redirect()->route('posts.index');
        }
    }
}
