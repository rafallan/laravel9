<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $nome = "Rafael";
        $posts = Post::all();
        return view('posts.post', ['nome' => $nome, 'posts' => $posts]);
    }
}
