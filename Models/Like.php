<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Like extends Model
{
    protected $table = 'like';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('user_id','image_id','created_at', 'updated_at');
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    public $timestamps = true;
}
