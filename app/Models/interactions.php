<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'type', 'date', 'description', 'rappel'
    ];
    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
