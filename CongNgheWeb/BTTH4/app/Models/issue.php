<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    protected $fillable = [
        'computer_id',
        'reported_by',
        'reported_date',
        'urgency',
        'description',
        'status',
    ];
    public function computer()
    {
        return $this->belongsTo(computer::class, 'computer_id', 'id');
    }
}
