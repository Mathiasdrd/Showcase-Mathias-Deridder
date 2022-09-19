<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function showUserProfile(User $user) {

        User::findOrFail($user->id);

        return view('profile', [
            'profile' => $user,
            'posts' => $user->posts
        ]);
    }
}
