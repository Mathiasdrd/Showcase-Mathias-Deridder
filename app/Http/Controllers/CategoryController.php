<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        return view('home', [
            'categories' => $categories
        ]);
    }
}
