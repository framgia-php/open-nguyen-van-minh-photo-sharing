<?php

namespace App\Repository;

use App\Models\Image;

class ImageRepository {
    public function getImage()
    {
        $images = Image::all();
        return $images;
    }
}
