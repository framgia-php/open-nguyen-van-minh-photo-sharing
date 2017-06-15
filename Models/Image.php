<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Image extends Model
{
	protected $primaryKey = 'image_id';
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('image_id', 'scope', 'path', 'description', 'like', 'user_id', 'created_at', 'updated_at');
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    public $timestamps = true;

}
