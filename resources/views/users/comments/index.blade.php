
@extends('layouts.app')

@section('title', "Comentarios do Usuário {$user->name}")

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2 text-center">
  Comentários do usuário {{$user->name}}
  <a href="{{ route('comments.create', $user->id) }}" class="bg-blue-900 rounded-full text-white px-4 text-sm">+</a>
</h1>
<form action="{{ route('users.index') }}" method="get" class="py-5 text-center">
    <input type="text" name="search" placeholder="Pesquisar" class="md:w-1/6 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Pesquisar</button>
</form>
<div class="flex justify-center">
<table class="w-150 leading-normal shadow-md rounded-lg overflow-hidden itens-center">
    <thead class="h-1 center">
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Comentario
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Visível
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Editar
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Detalhe
          </th>
        </tr>
      </thead>
      <tbody>
    @foreach ($comments as $comment)
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $comment->body}}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $comment->visible ? 'SIM' : 'NÃO' }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment]) }}" class="bg-green-200 rounded-full py-2 px-6">Editar</a>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('users.show', $user->id) }}" class="bg-orange-200 rounded-full py-2 px-6">Detalhes</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>



