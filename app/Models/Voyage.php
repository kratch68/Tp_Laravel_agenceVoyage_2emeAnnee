<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $table = 'voyage';
    public $timestamps = false;
    protected $fillable = [
        'nomVoyage',
        'dateDebut',
        'duree',
        'ville',
        'prix',
        'departement_id',
        'categorie_id'
      ];
    use HasFactory;
}
