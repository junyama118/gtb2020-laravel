<?php

namespace App\Http\Controllers;

use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return [
            ['name' => 'tom', 'content' => 'hello'],
            ['name' => 'sam', 'content' => 'world'],
        ];
    }

    public function store(\App\Http\Requests\Comments\Post $request)
    {
        $comment = Comment::create([
                'name' => $request->input('name'),
                'content' => $request->input('content'),
            ]);
           return response()->json($comment, 201);
    }

    public function show($id)
    {
    }

    public function update(\App\Http\Requests\Comments\Put $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
