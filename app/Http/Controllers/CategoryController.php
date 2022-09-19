<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showByCategory(Category $selectedCategory) {
        $categoriesTree = Category::tree()->get();

        $categories = $categoriesTree->toTree();

        return view('categories.show-category-posts',[
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'posts' => $selectedCategory->posts,
        ]);
    }
}
