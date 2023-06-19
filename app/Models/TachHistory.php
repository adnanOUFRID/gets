<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TachHistory extends Model
{
    use HasFactory;
    protected $table = 'tachehistory';

    protected $fillable = [
        'tache_id',
        'titre',
        'new_titre',
    ];
}
