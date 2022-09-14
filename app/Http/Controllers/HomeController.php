<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        $categories = DB::table('categories')
        ->whereNull('main_category_id')
        ->inRandomOrder()
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

        $featuredPosts = DB::table('posts')
        ->inRandomOrder()
        ->limit(10)
        ->join('users', function ($join) {
            $join->on('users.id', '=', 'posts.user_id');
        })
        ->select('users.id','users.name', 'posts.id', 'posts.tags','posts.image_path')
        ->get();

        return view('home', [
            'categories' => $categories,
            'featuredPosts' => $featuredPosts
        ]);
    }
}
