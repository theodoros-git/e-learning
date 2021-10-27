<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activite;

class File extends Model
{
    use HasFactory;

    public function files()
    {
        return $this->belongsToMany(Activite::class, 'activite_files', 'file_id', 'activity_id');
    }
}
