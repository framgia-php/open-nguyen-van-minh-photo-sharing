<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
}
