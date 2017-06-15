<?php

namespace App\Repository;

use App\Models\like;
use App\User;
use App\Models\Image;

class LikeRepository {

    /* Thêm 1 like từ user */
    public function addLike($image_id, $user_id)
    {
        if ($image_id && $user_id) {
            Like::create([
                'user_id' => $user_id,
                'image_id' => $image_id,
            ]);
            $image = Image::where('images.image_id', $image_id)
                ->get();
            $numlike = $image[0]['like'];
            $numlike = $numlike + 1;
            Image::where('images.image_id', $image_id)
                ->update(['like' => $numlike]);
            return 1;
        }
        else {
            return 0;
        }
    }

    /* Phương thức lấy tất cả người dùng like của 1 người dùng */
    public function getLikeByUserId($user_id)
    {
        return Like::join('users', 'like.user_id', '=', 'users.id')
            ->where('like.user_id', $user_id)
            ->get(['image_id']);
    }
    /* Phương thức bỏ like */
    public function removeLike(String $image_id, String $user_id)
    {
        if ($user_id && $image_id) {
            Like::where('like.user_id', $user_id)
                ->where('like.image_id', $image_id)
                ->delete();
            $image = Image::where('images.image_id', $image_id)
                ->get();
            $numlike = $image[0]['like'];
            $numlike = $numlike - 1;
            Image::where('images.image_id', $image_id)
                ->update(['like' => $numlike]);
            return 1;
        }
        else{
            return 0;
        }
    }
}
?>
