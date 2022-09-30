<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function showUserProfile(User $user) {

        $user = User::findOrFail($user->id);
        $posts = $user->posts()->paginate(4);

        return view('profile', [
            'profile' => $user,
            'posts' => $posts
        ]);
    }
}
