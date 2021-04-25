<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table = 'panier';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'users_id',
        'voyage_id',
      ];
}
