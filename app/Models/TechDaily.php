<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechDaily extends Model
{
    use HasFactory;

    protected $fillable = [
        'tdate',
        'plant',
        'capacity_utilisation',
        'power_consumption',
        'longterm_cargo_unloaded',
        'spot_cargo_unloaded',
        'service_cargo_unloaded',
        'C2C3_throughput',
    ];

    protected $dates = ['tdate'];
}
