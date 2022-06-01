<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalPerformace extends Model
{
    use HasFactory;

    protected $table = 'technical_performances';

    protected $fillable = [
        'period', 'throughput'
    ];

    
}
