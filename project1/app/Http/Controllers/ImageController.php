<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Image;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /* Phương thức lấy toàn bộ ảnh và các ảnh đã like của người dùng */
    public function getImage(Image $image, Like $like)
    {
        // Get all images in database
        $images = $image->getImage();
        // Get all images what user liked
        return view('home1', [
            'images' => $images,
            'like' => $like
        ]);
    }
    /* Phương thức di chuyển ảnh vào thư mục images */
    public function moveImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:png,jpeg,jpg,gif|max:10240'
        ]);

        $file = $request->file('image');

        // Move Uploaded File
        $destinationPath = 'images';
        $file->move($destinationPath, $file->getClientOriginalName());
        return view('postimage', [
            'path' => $file->getClientOriginalName()
        ]);
    }
    /* Phương thức đăng ảnh */
    public function postImage(Request $request, Image $image)
    {
        $scope = $request->scope;
        $description = $request->description;
        $path = $request->path;
        $userId = Auth::user()->id;
        if ($image->postImage($scope, $description, $path, $userId)) {
            return redirect('home');
        }
    }
    /* Phương thức lấy kho ảnh của một user*/
    public function storeImage(Request $request, Image $image)
    {
        $userId = Auth::user()->id;
        $images = $image->storeImage($userId);
        return view('storeimage', [
            'images' => $images
        ]);
    }
    /* Phương thức show thông tin ảnh trước khi chỉnh sửa */
    public function showImage(Request $request, Image $image)
    {
        $imageId = $request->id;
        // Chỉ được phép chỉnh sửa nếu ảnh đúng là của user
        if ($image->isImageBelongsUser($imageId, Auth::user()->id)) {
            $image = $image->getImageById($imageId);
            return view('editimage', [
                'image' => $image
            ]);
        }
        else {
            return redirect('/error');
        }
    }
    /* Phương thức cập nhật thông tin ảnh */
    public function updateImage(Request $request, Image $image)
    {
        $scope = $request->scope;
        $description = $request->description;
        $imageId = $request->imageId;
        // Chỉ cập nhật nếu ảnh đúng là của user
        if ($image->isImageBelongsUser($imageId, Auth::user()->id)) {
            if ($image->updateImage($imageId, $scope, $description)) {
                return redirect('home');
            }
        }
        else {
            return redirect('error');
        }
    }
}
