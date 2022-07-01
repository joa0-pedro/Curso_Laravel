@extends('layouts.app')



@section('title', "Novo Comentario para o usuário {$user->name}")


@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">Novo Comentario para o usuário {{$user->name}} </h1>
    @include('includes.validation-form')
<form action="{{route('comments.store', $user->id)}}" method="post" enctype="multipart/form-data">
    @include('users.comments._partials.form')
</form>
</ul>
@endsection 