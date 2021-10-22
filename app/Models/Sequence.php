<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    use HasFactory;

    protected $primaryKey = 'seq_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function sa()
    {
        return $this->belongsTo(Sa::class, 'foreign_key');
    }


    public function activites() {
    
        return $this->hasMany(Activite::class);
    }
}
