<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'services_category',
        'slug'
    ];
    public function services()
    {
        return $this->hasMany(Services::class);
    }
}
