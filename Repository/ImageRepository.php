<?php

namespace App\Repository;

use App\Models\Image;

class ImageRepository {
    /* Phương thức trả về toàn bộ thông tin ảnh trong database
        Output: Collection: Mảng các ảnh với đầy đủ thông tin
        về người đăng (name), đường dẫn (path), ...
    */
    public function getImage()
    {
        return Image::join('users', 'images.user_id', '=', 'users.id')
            ->orderBy('images.created_at','desc')
            ->where('scope','0')
            ->get();
    }

    /* Phương thức trả về toàn bộ thông tin của 1 ảnh
        Input: id của 1 ảnh
        Output: MẢNG 1 PHẦN TỬ:  Toàn bộ thông tin của 1 ảnh
    */
    public function getImageById(String $image_id)
    {
        return Image::where('images.image_id', $image_id)
            ->get();
    }

    public function getImageByUserId($user_id)
    {
        return Image::join('users', 'users.id', '=', 'images.user_id')
            ->where('images.user_id', $user_id)
            ->get();
    }
    /* Phương thức trả về toàn bộ ảnh của 1 user
        Input: id user
        Output: MẢNG n phần tử: toàn bộ thông tin ảnh của 1 user
    */
    public function storeImage(String $user_id)
    {
        return Image::join('users', 'images.user_id', '=', 'users.id')
            ->orderBy('images.created_at', 'desc')
            ->where('users.id', $user_id)
            ->get();
    }

    /* Phương thức thực hiện đăng ảnh
        Input: Phạm vi ảnh, miêu tả ảnh, đường dẫn và id user đăng ảnh
        Output: Cập nhật thông tin ảnh vào DB
    */
    public function postImage(String $scope, String $description, String $path, String $user_id)
    {
        Image::create([
            'scope' => $scope,
            'description' => $description,
            'path' => $path,
            'user_id' => $user_id,
            'like'  => '0',

        ]);
    }

    /* Phương thức cập nhật ảnh
        Input: id ảnh, phạm vi và miêu tả ảnh
        Output: 1 thành công, 0 lỗi
    */
    public function updateImage(String $image_id, String $scope, String $description)
    {
        $image = Image::find($image_id);
        if ($image) {
            $image->scope = $scope;
            $image->description = $description;
            $image->save();
            return 1;
        }
        else
            return 0;

    }
    /* Phương thức xóa ảnh
        Input: id ảnh
        Output: 1 thành công, 0 lỗi
    */
    public function deleteImage(String $image_id)
    {
        $image = Image::find($image_id);
        if ($image) {
            $image->delete();
            return 1;
        }
        else
            return 0;
    }
}
?>
