<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;
    public $fillable = [
        'images',
        'project_id'
    ];

    public function projectList()
    {
        return $this->belongsTo(Projects::class);
    }
}
