<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Td extends Model
{
    use HasFactory; 



    protected $fillable = [
        'td_id', 
        'designation',
        'created_by',
    ];
}
