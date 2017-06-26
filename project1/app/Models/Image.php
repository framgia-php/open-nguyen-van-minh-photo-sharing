<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'image_id';
    protected $fillable = [
        'image_id',
        'scope',
        'path',
        'description',
        'like',
        'user_id',
        'created_at',
        'updated_at'
    ];
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
