<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'date', 'lieu', 'description'
    ];
    // Relation avec le modèle Client
    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
