<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function create(Request $request)
    {
        Image::create([
            'scope' => $request->scope,
            'description' => $request->description,
            'path' => $request->path,
            'user_id' => Auth::user()->id,
            'like'  => '0',
        ]);

        return redirect('home');
    }
    public function destroy(Request $request)
    {
        $imageId = $request->imageId;
        $image = Image::find($imageId);

        // Kiểm tra sở hữu ảnh
        if ($image && $image->user_id === Auth::user()->id) {
            $image->delete();
            Comment::where('image_id', $imageId)->delete();
            Like::where('image_id', $imageId)->delete();

            return redirect('home');
        }
        else {
            return redirect('/error');
        }
    }
    public function update(Request $request)
    {
        // Chỉ cập nhật nếu ảnh đúng là của user
        $imageId = $request->image;
        $image = Image::find($imageId);

        if ($image && $image->user_id === Auth::user()->id) {
            $image->scope = $request->scope;
            $image->description = $request->description;
            $image->save();

            return redirect('storeimage');
        } else {
            return redirect('/error');
        }
    }
    public function show(Request $request)
    {
        $imageId = $request->image;
        $image = Image::find($imageId);

        // Chỉ được phép chỉnh sửa nếu ảnh đúng là của user
        if ($image && $image->user_id === Auth::user()->id) {
            return view('editimage', compact('image'));
        } else {
            return redirect('/error');
        }
    }
    /* Phương thức di chuyển ảnh vào thư mục images trước khi đăng*/
    public function moveImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:png,jpeg,jpg,gif|max:10240'
        ]);

        $file = $request->file('image');
        $destinationPath = config('app.storeimage');
        $path = $file->getClientOriginalName();
        $file->move($destinationPath, $file->getClientOriginalName());

        return view('postimage', compact('path'));
    }
    public function storeImage(Request $request)
    {
        $images = Image::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('storeimage', compact('images'));
    }
    /* Phuowng thức show ảnh trước khi xóa */
    public function validateDeleteImage(Request $request)
    {
        $imageId = $request->id;
        $image = Image::find($imageId);

        // Kiểm tra quyền sở hữu ảnh ^^
        if ($image && $image->user_id === Auth::user()->id) {
            return view('deleteimage', compact('image'));
        }
        else {
            return redirect('/error');
        }
    }
}
