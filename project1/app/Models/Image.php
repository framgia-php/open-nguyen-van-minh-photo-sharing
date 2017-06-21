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
    public function getImage()
    {
        return Image::orderBy('created_at', 'desc')
            ->get();
    }
    public function postImage($scope, $description, $path, $userId)
    {
        Image::create([
            'scope' => $scope,
            'description' => $description,
            'path' => $path,
            'user_id' => $userId,
            'like'  => '0',
        ]);
        return 1;
    }
    public function storeImage($userId)
    {
        if ($userId) {
            return Image::where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        else {
            return 0;
        }
    }
    public function isImageBelongsUser($imageId, $userId)
    {
        $image = Image::find($imageId);
        if (($image) && ($image->user_id === $userId)) {
            return 1;
        }
        else {
            return 0;
        }
    }
    public function getImageById($imageId)
    {
        return Image::find($imageId);
    }
    public function updateImage($imageId, $scope, $description)
    {
        $image = Image::find($imageId);
        if ($image && $image->user_id === Auth::user()->id) {
            $image->scope = $scope;
            $image->description = $description;
            $image->save();
            return 1;
        }
        else {
            return 0;
        }
    }
    public function deleteImage($imageId)
    {
        $image = Image::find($imageId);
        if ($image && $image->user_id === Auth::user()->id) {
            $image->delete();

            return 1;
        }
        else {
            return 0;
        }
    }

}
