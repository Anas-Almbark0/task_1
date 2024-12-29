<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileMetadata extends Model
{
    protected $fillable = ["file_id", "size", "status_hidden", "extension"];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
