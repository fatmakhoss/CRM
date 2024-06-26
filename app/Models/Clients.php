<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
class Clients extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'nom', 'prenom', 'adresse', 'telephone', 'email'
    ];
}


