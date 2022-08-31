<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $messages = [
            'required' => 'Campo obrigatório',
            'email' => 'Digite um e-mail válido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {


            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                $request->session()->regenerate();

                return redirect()->intended(route('posts.index'));
            } else {
                return redirect()->route('login.index')
                    ->with('mensagem', 'Dados inválidos');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index');
    }
}
