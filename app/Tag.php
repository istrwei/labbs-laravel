<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'description'];

    public static function getAllTags()
    {
        return self::get();
    }

    public static function createTag($tagFields)
    {
        $tag = new self($tagFields);
        $tag->save();
        return $tag;
    }
}
