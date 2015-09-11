<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['body'];

    public function author() {
        return $this->belongsTo(User::class);
    }
}
