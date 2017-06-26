<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image_id',
        'comment',
        'created_at',
        'updated_at'
    ];
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
