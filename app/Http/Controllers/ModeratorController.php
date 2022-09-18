<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['showAllUsers']]);
        $this->middleware('is_moderator', ['only' => ['showAllUsers']]);
    }
    
    public function showAllUsers() {

        $users = User::select('id', 'name','email','email_verified_at', 'active_account')
        ->where('is_moderator', false)
        ->get();
        return view('moderator.users', [
            'users' => $users,
        ]);
    }

    //activate or deactivate user accounts
    public function changeUserStatus(User $user) {
        if(!auth()->user()->active_account) {
            abort(403);
        }

        $data = User::findOrFail($user->id);

        if($data->active_account) {
            $data->active_account = false;
        } else {
            $data->active_account = true;
        }
        $data->save();

        return back()->with('message', 'User ' . $user->name . ' status has been changed');
    }
}
