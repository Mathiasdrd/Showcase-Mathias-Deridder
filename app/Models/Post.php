<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('tags', 'like', '%' . request('search') . '%')
            ->orWhere(function ($query) {
                $query->where('post_title', 'like', '%'.  request('search') . '%');
            });
        }
    }
      
    public function report() {
        return $this->hasMany(Report::class);
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
