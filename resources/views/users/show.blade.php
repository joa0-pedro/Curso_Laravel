@extends('layouts.app')

@section('title', 'Listagem do Usuário')

@section('content')

<h1 class="text-2xl font-semibold leading-tigh py-2">Listagem do usuário {{$user->name}}</h1>
<ul>
    <li>{{$user->name}}</li>
    <li>{{$user->email}}</li> 
    <li>{{$user->created_at}}</li>
</ul>
@endsection 