<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departures extends Model
{
    use HasFactory;
    protected $table = 'departures';
    protected $fillable = [
        'departure_category'
    ];
}
