<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';
    protected $fillable = [
        'travel_name',
        'travel_price',
        'travel_picture',
        'id_origin',
        'id_destination',
        'id_departure'
    ];

    public function origin() {
        return $this->belongsTo(Origins::class, 'id_origin');
    }
    
    public function destination() {
        return $this->belongsTo(Origins::class, 'id_destination');
    }
    
    public function departure() {
        return $this->belongsTo(Departures::class, 'id_departure');
    }
}
