<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ImageRepository;
use App\Repository\LikeRepository;
use App\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    //
    private $imageRepository;
    private $likeRepository;

    public function __construct(ImageRepository $imageRepository = null, LikeRepository $likeRepository = null)
    {
        $this->imageRepository = ($imageRepository === null) ? new ImageRepository : $imageRepository;
        $this->likeRepository = ($likeRepository === null) ? new LikeRepository : $likeRepository;
    }
    public function getImage(Request $request)
    {
        $images = $this->imageRepository->getImage();
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $tablelike = $this->likeRepository->getLikeByUserId($userId);
        }
        else {
            $tablelike = null;
        }
        return view('home1', [
            'images' => $images,
            'tablelike' => $tablelike
        ]);
    }
}
