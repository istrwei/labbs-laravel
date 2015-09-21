<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Topic;
use App\Reply;

class TopicController extends Controller
{
    public function showCreateTopic()
    {
        return view('topic.create');
    }

    public function create(Request $request)
    {
        $topic = new Topic($request->only('title', 'body'));
        $topic->author_id = $request->user()->id;
        $topic->save();

        return redirect('/');
    }

    public function view($topic_id)
    {
        return view('topic.view', [
            'topic' => Topic::findOrFail($topic_id)
        ]);
    }

    public function createReply(Request $request, $topic_id)
    {
        Topic::findOrFail($topic_id);

        $reply = new Reply($request->only('body'));
        $reply->author_id = $request->user()->id;
        $reply->topic_id = $topic_id;
        $reply->save();

        return redirect("/topics/{$topic_id}/view");
    }
}
