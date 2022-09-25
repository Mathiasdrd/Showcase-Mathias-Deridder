<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showByCategory(Category $selectedCategory) {
        $categoriesTree = Category::tree()->get();

        $categories = $categoriesTree->toTree();
        $posts = Post::where('category_id', '=', $selectedCategory->id)
        ->paginate(2); //for testing

        return view('categories.show-category-posts',[
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'posts' => $posts
        ]);
    }
}
