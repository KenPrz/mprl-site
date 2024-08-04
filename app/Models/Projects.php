<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'system_size',
        'monthly_saving',
        'content',
        'img_path',
    ];
    public function category()
    {
        return $this->belongsTo(ProjectCatergory::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function firstImage()
    {
        return $this->hasOne(ProjectImage::class)->oldest();
    }
}
