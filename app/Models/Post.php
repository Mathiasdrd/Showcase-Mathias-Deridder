<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
    }
            
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'post_title',
        'image_path',
        'description',
        'tags',
        'user_id',
        'category_id',
        'is_image_owner',
        'creator'
    ];
}
