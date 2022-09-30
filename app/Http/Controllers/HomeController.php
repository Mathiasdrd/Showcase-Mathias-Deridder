<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        $categoriesTree = Category::tree()->get();

        $categories = $categoriesTree->toTree();

        //fetch 6 random posts - different each refresh
        $featuredPosts = DB::table('posts')
        ->inRandomOrder()
        ->limit(6)
        ->join('users', function ($join) {
            $join->on('users.id', '=', 'posts.user_id');
        })
        ->select('users.name', 'posts.id', 'posts.user_id','posts.tags','posts.image_path')
        ->get();


        return view('home', [
            'posts' => Post::latest() //in case of search term, 
            ->filter(request(['search'])) //filter function -> Model/Post
            ->paginate(1)  //quantity - for easy testing
            ->withQueryString(), 
            'categories' => $categories,
            'featuredPosts' => $featuredPosts
        ]);
    }
}
