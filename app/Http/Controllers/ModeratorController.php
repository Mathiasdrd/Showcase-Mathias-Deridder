<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_moderator');
    }
    
    //show existing users that aren't moderators
    //for deactivation or activation of user accounts
    public function showAllUsers() {

        $users = User::select('id', 'name','email','email_verified_at', 'active_account')
        ->where('is_moderator', false)
        ->paginate(25);
        return view('moderator.users', [
            'users' => $users,
        ]);
    }

    //activate or deactivate user accounts
    public function changeUserStatus(User $user) {
      
        $data = User::findOrFail($user->id);

        if($data->active_account) {
            $data->active_account = false;
        } else {
            $data->active_account = true;
        }
        $data->save();

        return back()->with('message', 'User ' . $user->name . ' status has been changed');
    }


    //view for moderator handling
    public function showUsersModStatus() {
        $users = User::select('id', 'name','email','email_verified_at', 'active_account', 'is_moderator')
        ->where('active_account', true) //only return active users
        ->whereNot('id','=', auth()->user()->id)
        ->paginate(25);

        return view('moderator.mod-permissions', [
            'users' => $users,
        ]);
    }

    //grant or revoke moderator status 
    public function handlePermissions(User $user) {
        $data = User::findOrFail($user->id);

        if($data->is_moderator) {
            $data->is_moderator = false;
            $data->save();
    
            return back()->with('message', 'User ' . $user->name . '\'s moderator role has been revoked');
        } else {
            $data->is_moderator = true;
            $data->save();
    
            return back()->with('message', 'User ' . $user->name . ' has been granted a moderator role');
        }
    }

    public function showReportedPosts() {
        $reports = Report::select()
        ->paginate(25);

        return view('moderator.handle-reports', [
            'reports' => $reports,
        ]);
    }


}
