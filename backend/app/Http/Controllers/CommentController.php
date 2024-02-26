<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        return $this->commentService->findAllComments();
    }

    public function store(Request $request)
    {
        return $this->commentService->createComment($request);
    }

    public function show(Comment $comment)
    {
        return $this->commentService->showComment($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        return $this->commentService->updateComment($request, $comment);
    }

    public function delete(Comment $comment)
    {
        return $this->commentService->deleteComment($comment);
    }

}
