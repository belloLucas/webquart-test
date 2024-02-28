<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\House;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index(House $house)
    {
//        return $this->commentService->findAllCommentsFromHouse(Integer $house_id);
        return $this->commentService->findAllCommentsFromHouse($house->id);
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
