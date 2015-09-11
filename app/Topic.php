<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'body'];

    public static function getLatestTopics() {
        return self::orderBy('updated_at', 'desc')->get();
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
