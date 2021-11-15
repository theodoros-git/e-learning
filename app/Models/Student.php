<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Classe;

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

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'foreign_key');
    }
    
}
