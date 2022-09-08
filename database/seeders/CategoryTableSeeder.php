<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category_name' =>  'Sport',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'People',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Nature',
                'main_category_id' => null
            ],
            [
                'category_name' => 'Art',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Animals',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Transportation',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Food',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Music',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Fashion',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Countries',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Home',
                'main_category_id' => null
            ],
            [   
                'category_name' =>  'Technology',
                'main_category_id' => null
            ],
            [   
                'category_name' =>  'Items',
                'main_category_id' => null
            ],
            [   
                'category_name' =>  'Videogames',
                'main_category_id' => null
            ],
            [
                'category_name' =>  'Football',
                'main_category_id' => 1
            ],
            [
                'category_name' =>  'Basketball',
                'main_category_id' => 1
            ],
            [
                'category_name' => 'Tennis',
                'main_category_id' => 1
            ],
            [
                'category_name' =>  'Pets',
                'main_category_id' => 5
            ],
            [
                'category_name' =>  'Wildlife',
                'main_category_id' => 5
            ],
            [
                'category_name' =>  'Farm Animals',
                'main_category_id' => 5
            ],
            [
                'category_name' =>  'Breakfast',
                'main_category_id' => 7
            ],
            [
                'category_name' => 'Dinner',
                'main_category_id' => 7
            ],
            [
                'category_name' =>  'Fruits',
                'main_category_id' => 7
            ],
            [
                'category_name' =>  'Vegetables',
                'main_category_id' => 7
            ],
            [
                'category_name' =>  'Lunch',
                'main_category_id' => 7
            ],
            [
                'category_name' =>  'Mountains',
                'main_category_id' => 3
            ],
            [
                'category_name' =>  'Sea',
                'main_category_id' => 3
            ],
            [
                'category_name' =>  'Forests',
                'main_category_id' => 3
            ],
            [
                'category_name' =>  'Cities',
                'main_category_id' => 3
            ],
            [
                'category_name' =>  'Deserts',
                'main_category_id' => 3
            ],
            [
                'category_name' =>  'Sky',
                'main_category_id' => 3
            ],
            [
                'category_name' =>  'Caves',
                'main_category_id' => 3
            ],
            [
                'category_name' =>  'Drawings',
                'main_category_id' => 4
            ],
            [
                'category_name' =>  'Paintings',
                'main_category_id' => 4
            ],
            [
                'category_name' =>  'Performing',
                'main_category_id' => 4
            ],
            [
                'category_name' =>  'Sculptures',
                'main_category_id' => 4
            ],
            [
                'category_name' =>  'Photography',
                'main_category_id' => 4
            ],
            [
                'category_name' =>  'Instruments',
                'main_category_id' => 8
            ],
            [
                'category_name' =>  'Concerts',
                'main_category_id' => 8
            ],
            [
                'category_name' =>  'Singers',
                'main_category_id' => 8
            ],
            [
                'category_name' =>  'Bands',
                'main_category_id' => 8
            ],
            [
                'category_name' => 'Clothes',
                'main_category_id' => 9
            ],
            [
                'category_name' =>  'Streetwear',
                'main_category_id' => 9
            ],
            [
                'category_name' =>  'Shoes',
                'main_category_id' => 9
            ],
            [
                'category_name' =>  'Business',
                'main_category_id' => 9
            ],
            [
                'category_name' =>  'Casual',
                'main_category_id' => 9
            ],
            [
                'category_name' =>  'Cars',
                'main_category_id' => 6
            ],
            [
                'category_name' =>  'Planes',
                'main_category_id' => 6
            ],
            [
                'category_name' =>  'Boats',
                'main_category_id' => 6
            ],
            [
                'category_name' =>  'Trains',
                'main_category_id' => 6
            ],
            [
                'category_name' =>  'Furniture',
                'main_category_id' => 11
            ],
            [
                'category_name' =>  'Rooms',
                'main_category_id' => 11
            ],
        ];

        foreach($categories as $key => $value) {
            Category::create($value);
        }
    }
}
