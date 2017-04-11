<?php

namespace eeducar\Http\Controllers;

use eeducar\Chat;
use eeducar\Http\Requests\ChatRequest;
use eeducar\User;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    public function index()
    {
        if (Auth::user()->cant('visualizar', Chat::class)):
            return redirect('chats.chat');
        endif;
        $users = User::has('chats')->paginate(config('constantes.paginacao'));
        return view('chat.index', compact('users'));
    }

    public function salvar(ChatRequest $request)
    {
        $chat = new Chat($request->all());
        $chat->remetente()->associate(Auth::user());
        $chat->save();
    }

    public function chat($user_id = null)
    {
        //$chats = $user_id?Chat::lista($user_id):Chat::with('usuario')->orderBy('id', 'desc')->get();
        $chats = Chat::lista($user_id ? $user_id : Auth::user()->id);
        /*if ($user_id):
            $chats = Chat::lista($user_id);//Incluir lógica para buscar conversas do usuário com id informado
        else:
            $chats = Chat::with('usuario')->orderBy('id', 'desc')->get();
        endif;*/
        return view('chat.chat', compact('chats'));
    }

    public function excluir($id)
    {

    }
}
