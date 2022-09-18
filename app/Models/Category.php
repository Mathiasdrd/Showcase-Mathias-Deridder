<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;
    
    public function getParentKeyName()
    {
        return 'main_category_id';
    }

    public function children()
    {
        return $this->hasMany(self::class, 'main_category_id', 'id');
    }
    
    
    public function posts() {
        return $this->hasMany(Post::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
