<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    // timestamp
    public $timestamps = false;

    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
}
