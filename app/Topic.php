<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'body'];

    public static function getLatestTopics()
    {
        return self::orderBy('updated_at', 'desc')->paginate();
    }

    public static function topicsCount()
    {
        return self::count();
    }

    public static function createTopic($user, $topicFields)
    {
        $topic = new self($topicFields);
        $topic->author_id = $user->id;
        $topic->save();
        return $topic;
    }

    public function createReply($user, $replyFields)
    {
        $reply = new Reply($replyFields);
        $reply->author_id = $user->id;
        $reply->topic_id = $this->id;
        $reply->save();
        return $reply;
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('created_at');
    }
}
