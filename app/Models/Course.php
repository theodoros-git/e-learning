<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Sa;
use App\Models\Classe;
use App\Models\CategoryCourse;

class Course extends Model
{
    use HasFactory;

    


    protected $fillable = [
        'cours_id',
        'designation',
        'category_course_id',
        'created_by',
    ];

    public function category_course() {
    
        return $this->belongsTo(CategoryCourse::class, 'foreign_key');
    }

    public function sas() {
    
        return $this->hasMany(Sa::class);
    }


    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students', 'course_id', 'student_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'foreign_key');
    }
}
