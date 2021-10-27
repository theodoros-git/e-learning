<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'username',
        'fullname',
        'school',
        'password',
        'gender',
        'email',
        'level',
        'phone',
        'abonnement_is_active',
    ];



    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_students', 'student_id', 'course_id');
    }
    
}
