<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function files()
    {
        return $this->belongsToMany(File::class, 'file_group');
    }
}
