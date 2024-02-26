<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function findAllComments()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function createComment($request)
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

    public function showComment($comment)
    {
        return response()->json($comment);
    }

    public function updateComment($request, $comment)
    {
        $validatedData = $request->validate([
            'comment' => 'string',
            'avaliation_note' => 'integer'
        ]);

        $comment->update($validatedData);
        return response()->json($comment, 200);
    }

    public function deleteComment($comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}
