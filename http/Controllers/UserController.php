<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Repository\ImageRepository;

class UserController extends Controller
{
    //
    private $imageRepository;

    public function __construct(ImageRepository $imageRepository = null)
    {
        $this->imageRepository = ($imageRepository === null) ? new ImageRepository : $imageRepository;
    }
    public function register(Request $request)
    {
        if (!($request->password === $request->password_confirmation)) {
            return redirect('register');
        }
        else {
            $this->validate($request, [
                'password'=>'required|min:6',
                'password_confirmation'=>'required|min:6'
            ]);
        	User::create([
        		'name' => $request->name,
        		'email' => $request->email,
        		'password' => bcrypt($request->password),
        		'avatar_photo' => 'avatar.jpg',
        		'cover_photo' => 'cover.jpg',
        	]);
        	return redirect('home');
        }
    }
    public function checklogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('home');
        } else {
            return redirect('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('home');
    }

    public function showProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::getUser($user_id);
        $images = $this->imageRepository->getImageByUserId($user_id);
        return view('editprofile', ['user' => $user, 'images' => $images]);
    }
    public function editProfile(Request $request)
    {
        //dd($request);
        $user_id = Auth::user()->id;
        $name = $request->user_name;
        $avatar_photo = $request->avatar_photo;
        $cover_photo = $request->cover_photo;
        if (User::updateProfile($user_id, $name, $avatar_photo, $cover_photo)) {
            return redirect('profile');
        }
        else {
            echo "Loi chinh sua anh";
        }

    }
}
