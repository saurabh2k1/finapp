<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $fillable = [
        'year', 'qtr', 'PBT', 'PAT', "EBITDA",
        'revenue', 'margin', 'expense'
    ];
    
}
