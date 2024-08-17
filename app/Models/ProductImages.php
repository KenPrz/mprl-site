<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    public $fillable = [
        'images',
        'product_id'
    ];

    public function productList()
    {
        return $this->belongsTo(Product::class);
    }
}
