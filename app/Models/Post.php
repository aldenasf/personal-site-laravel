<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'content', 'pinned', 'image'];

    /** @use HasFactory<PostFactory> */
    use HasFactory;
}
