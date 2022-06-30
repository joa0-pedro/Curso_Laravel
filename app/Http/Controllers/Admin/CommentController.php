<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Comment,
    User
};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $model;
    protected $user;


    public function __construct(Comment $comment, User $user)
    {
        $this->model = $comment;
        $this->user = $user;

    }

    public function index($userId)
    {
       if (!$user = $this->user->find($userId)) {
            return redirect()->back();

       }
        $comments = $user->comments()->get();

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($userId)
    {
       if (!$user = $this->user->find($userId)) {
            return redirect()->back();

       }
        return view('users.comments.create', compact('user'));
    }

    public function store(Request $request, $userId)
    {
       if (!$user = $this->user->find($userId)) {
            return redirect()->back();

       }

       $user->comments()->create([
        'body'=> $request->body,
        'visible'=>isset($request->visible),
       ]);
        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userId, $id) 
    {
       if (!$comment = $this->Comment->find($id)) {
            return redirect()->back();
       }

       $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }
}


