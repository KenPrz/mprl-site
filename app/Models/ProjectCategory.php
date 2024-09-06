<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];
    public function projects()
    {
        return $this->hasMany(Projects::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faqs::class);
    }
}
