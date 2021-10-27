<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sequence;
use App\Models\Course;

class Sa extends Model
{
    use HasFactory;

    


    protected $fillable = [
        'situation_id',
        'designation',
        'course_id',
        'created_by',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'foreign_key');
    }

    public function sequences() {
    
        return $this->hasMany(Sequence::class);
    }
}
