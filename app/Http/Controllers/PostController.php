<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update','delete']]);
        // $this->middleware('verified', ['only' => ['store', 'update', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
        ->select('id','category_name')
        ->orderBy('category_name', 'asc')
        ->get();
        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //set up email verification first 
        
        // if(auth()->user()->email_verified_at === null) {
        //     return back()->withErrors('Unable to post without email verification. Please verify your email first.');
        // }

        //validate and add to formfields variable
        $formFields = $request->validate([
            'image_path' => 'required|file|mimes:jpg,png,jpeg,svg,webp',
            'post_title' => 'required|max:50',
            'description' => 'required|max:150',
            'tags' => 'required|max:100',
            'is_image_owner' => 'required'
        ]);
        $formFields['user_id'] = auth()->id();


        //if image is not owned by OP, check for reference/creator 
        if ($request->is_image_owner == 0 && $request->creator !== null ) {
            $creator = strip_tags($request->creator);
            $formFields['creator'] = $creator;
        }

        //check if category was selected: not manditory
        if ($request->category !== null) {
            $formFields['category_id'] = $request->category;
        }

        //replace spaces in post_title with underscore
        //for image file name
        $request->post_title = preg_replace('/\s+/', '_', $request->post_title);

        //gives image file a new name
        $newImagePath = time() . "_" . $request->post_title . '.' .
        $request->image_path->extension();
        
        //moves image to public/images folder to display on website
        $request->image_path->move(public_path('images'), $newImagePath);

        $formFields['image_path'] = $newImagePath;

        Post::create($formFields);

        return redirect('/')->with('message', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('posts.show', [
            'post'=> $post,
            'post_creator' => $post->user,
            'post_category' => $post->category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = DB::table('categories')
        ->select('id','category_name')
        ->orderBy('category_name', 'asc')
        ->get();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = Post::findOrFail($post->id);

        $request->validate([
            'post_title' => ['required', 'max:150'],
            'description' => ['required', 'max:250'],
            'tags' => 'required|max:250',
        ]);
        if($request->category !== null) {           
            Category::findOrFail($request->category);
        }

        $data->post_title = $request->post_title;
        $data->description = $request->description;
        $data->tags = $request->tags;
        $data->category_id = $request->category;

        $data->save();
        return redirect()->route('posts.edit', $post)->with('message', 'Your post was succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        unlink("images/". $post->image_path);
        $post->delete();
        return redirect()->route('home');
    }
}
