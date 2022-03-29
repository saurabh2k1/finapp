<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechMonthly extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'month',
        'plant',
        'throughput',
        'highest_sendout',
        'highest_truck_no',
        'sendout_date',
        'truckload_date',
    ];

    protected $dates = [ 'sendout_date',
    'truckload_date',];

    
}
