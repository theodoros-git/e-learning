<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CategoryCourse extends Model
{
    use HasFactory;

    


    protected $fillable = [
        'categorie_id',
        'designation',
        'created_by',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
