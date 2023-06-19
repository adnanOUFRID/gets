<?php

namespace App\Models;

use App\Events\TacheUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'date_echeance',
        'statut'
    ];
}
