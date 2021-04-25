<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    public $timestamps = false;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'ville',
        'CP',
        'telephone',
        'courriel',
        'genre',
        'province_id',
        'premierContact_id'
      ];
    use HasFactory;

    function ObtenirSesVentes()
    {
      return $this->hasMany('App\Models\Vente','client_id','id');
    }
}
