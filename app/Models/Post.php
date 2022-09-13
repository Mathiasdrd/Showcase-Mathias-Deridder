<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
