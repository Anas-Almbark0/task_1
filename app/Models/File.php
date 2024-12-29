<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable = ["name", "description", "path", "user_id"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function metadata()
    {
        return $this->hasOne(FileMetadata::class, "file_id");
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'file_group');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function getReadableSizeAttribute()
    {
        $bytes = $this->metadata->size;
        $units = ['bytes', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
