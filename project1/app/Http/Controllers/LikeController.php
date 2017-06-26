<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function create(Request $request)
    {
        $imageId = $request->imageId;
        $image = Image::find($imageId);
        if ($image->user_id == Auth::user()->id) {
            Like::create([
                'user_id' => Auth::user()->id,
                'image_id' => $imageId,
            ]);

            $numlike = $image->like;
            $numlike = $numlike + 1;

            $image->update(['like' => $numlike]);

            return 1;
        } else {
            return 0;
        }
    }
    public function destroy(Request $request)
    {
        $imageId = $request->imageId;
        $image = Image::find($imageId);
        if ($image->user_id == Auth::user()->id) {
            Like::where('user_id', Auth::user()->id)
                ->where('image_id', $imageId)
                ->delete();
            $numlike = $image->like;
            $numlike = $numlike - 1;

            $image->update(['like' => $numlike]);

            return 1;
        } else {
            return 0;
        }
    }
}
