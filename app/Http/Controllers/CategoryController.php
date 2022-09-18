<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showByCategory(Category $category) {
        return view('categories.show-category-posts',[
            'category' => $category,
            'posts' => $category->posts,
        ]);
    }
}
