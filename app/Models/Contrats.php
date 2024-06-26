<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrats extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'numero_contrat', 'date_debut', 'date_fin', 'details'
    ];
     // Relation avec le modèle Client
     public function client()
     {
         return $this->belongsTo(Clients::class);
     }

}
