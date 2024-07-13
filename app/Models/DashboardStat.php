<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DashboardStat extends Model
{
    use HasFactory;
    protected $table= 'dashboard_stats';
    protected $fillable=['stat_key','stat_value'];
}


