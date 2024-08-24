<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origins extends Model
{
    use HasFactory;
    protected $table = 'origins';
    protected $fillable = [
        'origin_name'
    ];
}
