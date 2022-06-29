@extends('layouts.app')



@section('title', 'Editar o usuário {{$user->$name}} ')


@section('content')
<h1>Editar o usuário {{$user->name}} </h1>
    @include('includes.validation-form')
<form action="{{ route('users.update', $user->id)}}" method="post">
    @method('PUT')
    @include('users._partials.form')
</form>
</ul>
@endsection 