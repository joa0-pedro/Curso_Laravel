<h1>Listagem dos usuários </h1>
<ul>
@foreach ($users as $users)
    <li>
        {{$users->name}} - 
        {{$users->email}}
    </li>
@endforeach
</ul>