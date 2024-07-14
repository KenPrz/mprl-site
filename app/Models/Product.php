<?php

namespace App\Models;

use Database\Seeders\ProductSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable =[
        'name',
        'category_id',
        'power_out',
        'efficiency',
        'dimension',
        'weight',
        'type',
        'voltage',
        'current',
        'temp_coeff',
        'price',
        'discount',
        'warranty',
        'stock_level',
        'supplier',
        'certification',
        'description',
        'img_path',
        'datasheet',
        'is_displayed',
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function firstImage()
    {
        return $this->hasOne(ProductImages::class)->oldest();
    }
}
