<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image_id',
        'created_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }
    public function getLikeByUserId($userId)
    {
        return Like::all()
            ->where('user_id', $userId);
    }
    public function isLike($userId, $imageId)
    {
        return Like::where([
            ['user_id', '=', $userId],
            ['image_id', '=', $imageId],
        ])->get();
    }
}
