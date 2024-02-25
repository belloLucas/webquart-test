<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'house_id' => 'required|integer|exists:houses,id',
            'comment' => 'required|string',
            'avaliation_note' => 'required|integer'
        ]);

        $comment = Comment::create($validatedData);
        return response()->json($comment, 201);
    }

    public function show(Comment $comment)
    {
        return response()->json($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'comment' => 'string',
            'avaliation_note' => 'integer'
        ]);

        $comment->update($validatedData);
        return response()->json($comment, 200);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }

}
