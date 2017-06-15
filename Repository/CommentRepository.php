<?php

namespace App\Repository;

use App\Models\Comment;
use App\User;

class CommentRepository {

    /* Phương thức thêm comment */
    public function addComment($image_id, $user_id, $comment)
    {
        if (($image_id) && ($user_id) && ($comment)) {
            Comment::create([
                'user_id' => $user_id,
                'image_id' => $image_id,
                'comment' => $comment,
            ]);
            return 1;
        }
        else {
            return 0;
        }
    }
    /* Phương thức lấy tất cả comment của 1 ảnh */
    public function getComment(String $image_id)
    {
        return Comment::join('users', 'comment.user_id', '=', 'users.id')
            ->where('comment.image_id', $image_id)
            ->orderBy("comment.created_at", "desc")
            ->get(['comment', 'name', 'avatar_photo']);
    }
}
?>
