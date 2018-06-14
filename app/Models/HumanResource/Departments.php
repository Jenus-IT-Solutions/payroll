<?php

namespace App\Models\HumanResource;

use \App\Model;

class Departments extends Model
{
    //
    public function lead() {
        return $this->belongsTo(\App\User::class, 'lead');
    }

}
