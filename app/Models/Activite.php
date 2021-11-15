<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sequence;
use App\Models\File;

class Activite extends Model
{

    

    protected $fillable = [
        'activity_id', 
        'designation',
        'description',
        'sequence_id',
        'created_by',
    ];

    use HasFactory;

    public function sequence()
    {
        return $this->belongsTo(Sequence::class, 'foreign_key');
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'activite_files', 'activite_id', 'file_id');
    }
}
