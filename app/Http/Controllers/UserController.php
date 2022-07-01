<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserFormRequest;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model
                        ->getUsers(
                            search: $request->search ?? ''
                        );
        return view('users.index', compact('users'));
      
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

    public function store (StoreUpdateUserFormRequest $request)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if($request->image){
            $data['image'] = $request->image->store ('public.images');

            // $extension = $request->image->getClientOriginalExtension();
            // $data['image'] = $request->image->storeAs('user', now(). ".{$extension}");
            
        }
        $this->model->create($data);
    
        return redirect()-> route('users.index');

    } 

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));

    }
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id)){
            return redirect()->route('users.index');
        }
        $data = $request->only('name', 'email');
        
        if($request->password){ 
            $data['password'] = bcrypt($request->password);
        }

        if($request->image){
            if($user->image && Storage::exists($user->image)){
                Storage::delete($user->image);
            }
            $data['image'] = $request->image->store('users');
        }
        $user->update($data);

        return redirect()->route('users.index');
    }
        
        
    }