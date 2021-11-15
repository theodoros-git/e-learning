<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Course;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'created_by',
    ];

    public function students() {
    
        return $this->hasMany(Student::class);
    }

    public function courses() {
    
        return $this->hasMany(Course::class);
    }
}
