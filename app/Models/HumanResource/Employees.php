<?php

namespace App\Models\HumanResource;

use \App\Model;

class Employees extends Model
{
    //
    public function user() {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
