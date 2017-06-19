<?php

namespace App\Repository;

use App\Models\Like;

class LikeRepository {
    public function getLikeByUserId($userId)
    {
        return Like::all()
            ->where('user_id', $userId)
            ->get('image_id');
    }
}
