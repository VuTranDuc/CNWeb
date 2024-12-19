<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hardware_devices extends Model
{
    public function it_center()
    {
        return $this->belongsTo(it_center::class, 'it_center_id', 'id');
    }
}
