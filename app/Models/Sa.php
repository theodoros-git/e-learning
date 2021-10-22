<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sa extends Model
{
    use HasFactory;

    protected $primaryKey = 'situation_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function course()
    {
        return $this->belongsTo(Course::class, 'foreign_key');
    }

    public function sequences() {
    
        return $this->hasMany(Sequence::class);
    }
}
