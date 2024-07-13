<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class admin extends Model
{
    use Notifiable;
    const ADMINISTRATEUR = 'administrateur';
    const USERS = 'Users';
    protected $fillable=[
        'nom_utilisateur','mot_de_passe','email','role',
    ];

    public function isAdmin(){
        return $this->role===self::ADMINISTRATEUR;
    }
}
