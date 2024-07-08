<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Casts\PurifyHtmlOnGet;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'is_published',
        'created_by',
        'is_featured',
        'clicks',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'clicks' => 'integer',
        'body' => PurifyHtmlOnGet::class, // Protect against XSS
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_post_category');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }

    public function firstImage()
    {
        return $this->hasOne(BlogImage::class)->oldest();
    }
     
}
