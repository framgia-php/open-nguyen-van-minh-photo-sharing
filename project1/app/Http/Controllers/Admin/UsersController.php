<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Image;
use App\Models\Like;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|min:6',
            'email' => 'required|unique:users',
        ]);

        if ($request->role == 1) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'admin'
            ]);
        }
        else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'user'
            ]);
        }
        return redirect('admin/users');
    }
    public function show(Request $request)
    {
        $user = User::find($request->user);
        return view('admin.user.edit', compact('user'));
    }
    public function destroy(Request $request)
    {
        User::find($request->user)
            ->delete();
        $image = Image::where('user_id', $request->user);
        if ($image->get()->isEmpty()) {
            $image->delete();
        }
        $like = Like::where('user_id', $request->user);
        if ($like->get()->isEmpty()) {
            $like->delete();
        }
        return redirect('admin/users');
    }
    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $user = User::find($request->user);
        $user->update([
            'name' => $request->name,
        ]);
        if ($request->role == 1) {
            $user->update(['role' => 'admin']);
        } else {
            $user->update(['role' => 'user']);
        }
        return redirect('admin/users');
    }
    public function validateDelete(Request $request)
    {
        $user = User::find($request->user);
        return view('admin.user.destroy', compact('user'));
    }
}
