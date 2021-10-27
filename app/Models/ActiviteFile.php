<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiviteFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'activite_id',
        'file_id',
        
    ];
}
