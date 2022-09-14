<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function showAllUsers() {

        $moderator = auth()->user()->is_moderator;
        $this->authorize('view', $moderator);
    }
}
