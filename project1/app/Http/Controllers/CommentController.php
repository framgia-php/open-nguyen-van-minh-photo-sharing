<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function create(Request $request)
    {
        $comment = $request->comment;

        Comment::create([
            'user_id' => Auth::user()->id,
            'image_id' => $request->imageId,
            'comment' => $request->comment,
        ]);

        return view('comment', compact('comment'));
    }

    public function show($id, Request $request)
    {
        $imageId = $request->comment;

        $comments = Comment::orderBy('created_at')
            ->where('image_id', $imageId)
            ->get();

        return view('showcomment', compact('comments'));
    }
}
