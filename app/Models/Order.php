<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'id_user',
        'id_travel',
        'quantity',
        'status'
    ];

    public function travel() {
        return $this->belongsTo(Travel::class, 'id_travel');
    }
}
