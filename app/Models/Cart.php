<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'id_user',
        'id_travel',
        'quantity',
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'id_travel');
    }
}
