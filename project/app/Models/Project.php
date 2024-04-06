<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // timestamp
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Pcategory::class);
    }

}
