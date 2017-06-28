<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Like;

class ImageController extends Controller
{
    //
    public function index()
    {
        $images = Image::all();
        return view('admin.image.index', compact('images'));
    }
    public function show(Request $request)
    {
        $image = Image::find($request->image);
        return view('admin.image.destroy', compact('image'));
    }
    public function destroy(Request $request)
    {
        $image = Image::find($request->image);
        if ($image) {
            $image->delete();
        }
        $comment = Comment::where('image_id', $request->image);
        if ($comment->get()->isEmpty()) {
            $comment->delete();
        }
        $like = Like::where('image_id', $request->image);
        if ($like->get()->isEmpty()) {
            $like->delete();
        }
        return redirect('admin/images');
    }
}
