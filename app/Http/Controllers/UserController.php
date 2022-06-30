<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {

        $search = $request->search;
        $users = $this->model->where(function ($query) use($search) {
            if ($search){
            $query->where('email',$search);
            $query->orWhere('name','LIKE',"%{$search}%");
            }
        })->get();


        return view('users.index',compact('users'));
    }
    public function show($id)
    {
        // $user = $this->model->where('id', $id)->first();
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store (CreateUserFormRequest $request)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $this->model->create($data);
    
        return redirect()-> route('users.index');

    } 

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));

    }
    public function update(UpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id)){
            return redirect()->route('users.index');
        }
        $data = $request->only('name', 'email');
        
        if($request->password){ 
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }
        
        
    }