<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pcategory extends Model
{
    //timestamps
    public $timestamps = false;

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }
}
