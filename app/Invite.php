<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
