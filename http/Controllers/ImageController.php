<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Repository\ImageRepository;
use App\Repository\LikeRepository;

class ImageController extends Controller
{
    private $imageRepository;
    private $likeRepository;

    public function __construct(ImageRepository $imageRepository = null, LikeRepository $likeRepository)
    {
        $this->imageRepository = ($imageRepository === null) ? new ImageRepository : $imageRepository;
        $this->likeRepository = ($likeRepository === null) ? new LikeRepository : $likeRepository;
    }


   /* Phuong thuc hien thi toan bo thong tin tat ca cac anh */
    public function showInfor()
    {
        $images = $this->imageRepository->getImage();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $tablelike = $this->likeRepository->getLikeByUserId($user_id);
        }
        else {
            $tablelike = null;
        }
        return view('home', ['images' => $images, 'tablelike' => $tablelike]);
    }
}
