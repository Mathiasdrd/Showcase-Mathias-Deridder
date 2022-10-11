<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function store(Request $request, Post $post) {
       
        if(!auth()->check()) {
            return back()->withErrors(['message', 'Please login first']);
        }

        if($post->user_id === auth()->user()->id) {
            return redirect()->route('posts.show', [$post])
            ->with('message', 'Cannot report own post. If you do not want this post up, you can just delete it');
        }
        $user = auth()->user()->id;

        if(Report::where([
            ['complainant_id', '=', $user],
            ['post_id', '=', $post->id],
        ])->exists()) {
            return redirect()->route('posts.show', [$post])
            ->with('message', 'You have already reported this post, please wait while we handle your request');
        }
       

        $data = $request->validate([
            'report_reason_id' => 'required',
        ]);
        $data['post_id'] = $post->id;
        $data['complainant_id'] = auth()->user()->id;

        Report::create($data);

        return redirect()->route('posts.show', [$post])->with(['success', 'Thank you for your report, we will look into this post as soon as we can']);
    }
}
