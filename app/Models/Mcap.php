<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcap extends Model
{
    use HasFactory;

    protected $fillable = [
        'ason_date', 'share_no', 'share_price', 'mcap', 'networth'
    ];

    protected $dates = ['ason_date'];
}
