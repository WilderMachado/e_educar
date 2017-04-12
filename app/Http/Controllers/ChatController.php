<?php

namespace eeducar\Http\Controllers;

use eeducar\Chat;
use eeducar\Http\Requests\ChatRequest;
use eeducar\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class ChatController extends Controller
{
    public function index()
    {
        if (Auth::user()->cant('visualizar', Chat::class)):
            return redirect()->route('chats.chat');
        endif;
        $users = User::comChat(Auth::user()->id)->paginate(config('constantes.paginacao'));
        return view('chat.index', compact('users'));
    }

    public function salvar(ChatRequest $request)
    {
        $chat = new Chat($request->all());
        $chat->remetente()->associate(Auth::user());
        $chat->save();
    }

    public function chat()
    {
        $user_id = Input::get('user_id');
        $chats = Chat::lista($user_id ? $user_id : Auth::user()->id)->reverse();
        $destinatario_id = $user_id;
        return view('chat.chat', compact('chats', 'destinatario_id'));
    }

    public function listar()
    {
        $user_id = Input::get('user_id');
        return response()->json(Chat::lista($user_id ? $user_id : Auth::user()->id));
    }

    public function excluir($user_id)
    {
        Chat::destroy(Chat::lista($user_id)->pluck('id')->toArray());
        return redirect('chats');
    }
}
