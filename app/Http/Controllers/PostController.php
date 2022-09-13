<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
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
        //validate and add to formfields variable
        $formFields = $request->validate([
            'post_title' => 'required|max:150',
            'image_path' => 'required|image|mimes:jpg,png,jpeg,svg',
            'description' => 'required|max:250',
            'tags' => 'required|max:250',
            'is_image_owner' => 'required'
        ]);
        $formFields['user_id'] = auth()->id();


        //check if category was selected: not manditory
        if ($request->category !== null) {
            $formFields['category_id'] = $request->category;
        }

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
        $post_creator = DB::table('users')
        ->where('id', '=', $post->user_id)
        ->select('name')
        ->get();
        $post_category = DB::table('categories')
        ->where('id', '=', $post->category_id)
        ->select('id', 'category_name')
        ->get();
        return view('posts.show', [
            'post'=> $post,
            'post_creator' => $post_creator,
            'post_category' => $post_category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
