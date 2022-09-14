<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        $categories = DB::table('categories')
        ->whereNull('main_category_id')
        ->orderBy('category_name', 'asc')
        ->get();
        for ($i=0; $i < count($categories) ; $i++) {  
            $subcategories = DB::table('categories')
            ->where('main_category_id', $categories[$i]->id)
            ->orderBy('category_name', 'asc')
            ->get();
            if (!empty($subcategories[0])) {
                $categories[$i] = [
                    'main_category' => $categories[$i],
                    'subcategories' => $subcategories
                ];
            } else {
                $categories[$i] = [
                    'main_category' => $categories[$i]
                ];
            }
        }

        //NEEDS TESTING -> Add more images

        // $suggested_categories = DB::table('categories')
        // ->inRandomOrder()
        // ->limit(3)
        // ->join('posts', function($join) {
        //     $join->on('categories.id', '=', 'posts.category_id');
        // })
        // ->select('categories.id', 'categories.category_name', 'posts.id', 'posts.image_path')
        // ->limit(3)
        // ->get();

        // dd($suggested_categories);

        // $featuredPosts = DB::table('posts')
        // ->inRandomOrder()
        // ->limit(10)
        // ->join('users', function ($join) {
        //     $join->on('users.id', '=', 'posts.user_id');
        // })
        // ->select('users.id','users.name', 'posts.id', 'posts.tags','posts.image_path')
        // ->get();

        return view('home', [
            'categories' => $categories,
            // 'featuredPosts' => $featuredPosts
        ]);
    }
}
