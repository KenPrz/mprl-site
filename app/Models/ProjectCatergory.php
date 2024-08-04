<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectCatergory extends Model
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
}
