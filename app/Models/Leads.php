<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'date', 'lieu', 'description'
    ];
    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
