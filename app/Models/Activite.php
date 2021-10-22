<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{

    protected $primaryKey = 'activity_id';

    public $incrementing = false;

    protected $keyType = 'string';

    use HasFactory;

    public function sequence()
    {
        return $this->belongsTo(Sequence::class, 'foreign_key');
    }
}
