<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'cours_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function categorycourse() {
    
        return $this->belongsTo(CategoryCourse::class, 'foreign_key');
    }

    public function sas() {
    
        return $this->hasMany(Sa::class);
    }


    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students', 'course_id', 'student_id');
    }
}
