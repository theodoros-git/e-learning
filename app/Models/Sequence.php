<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sa;
use App\Models\Activite;

class Sequence extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'seq_id', 
        'designation',
        'sa_id',
        'created_by',
    ];

    public function sa()
    {
        return $this->belongsTo(Sa::class, 'foreign_key');
    }


    public function activites() {
    
        return $this->hasMany(Activite::class);
    }
}
