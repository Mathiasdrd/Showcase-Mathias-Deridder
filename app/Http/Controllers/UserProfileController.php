<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function showUserProfile($id) {

        //get profile owner's name
        $profile = DB::table('users')
        ->where('id', '=', $id) 
        ->select('name')
        ->get();

        //get posts posted by profile
        $posts = DB::table('posts')
        ->where('user_id', '=', $id)
        ->select()
        ->get();

        return view('profile', [
            'profile' => $profile,
            'posts' => $posts
        ]);
    }
}
