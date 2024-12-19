<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    public function movies()
    {
        return $this->belongsTo(cinema::class, 'movie_id', 'id');
    }
}
