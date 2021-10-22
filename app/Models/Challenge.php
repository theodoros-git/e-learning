<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $primaryKey = 'challeng_id';

    public $incrementing = false;

    protected $keyType = 'string';
}
