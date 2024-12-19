<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laptop extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'specification',
        'rental_status',
        'renter_id',
    ];
    function renter()
    {
        return $this->belongsTo(renter::class, 'renter_id', 'id');
    }
}
