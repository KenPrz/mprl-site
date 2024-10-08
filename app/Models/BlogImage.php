<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'blog_post_id'
    ];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
