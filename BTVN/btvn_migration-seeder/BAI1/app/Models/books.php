<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $fillable = ["title", "author", "publication_year", "genre", "library_id"];
    public function library()
    {
        return $this->belongsTo(libraries::class, 'library_id', 'id');
    }
}
