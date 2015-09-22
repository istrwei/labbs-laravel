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
        $topic = Topic::createTopic($request->user(), $request->only('title', 'body'));
        return redirect("/topics/{$topic->id}/view");
    }

    public function view($topicId)
    {
        $topic = Topic::findOrFail($topicId);

        return view('topic.view', [
            'topic' => $topic,
            'replies' => $topic->replies()->paginate()
        ]);
    }

    public function createReply(Request $request, $topicId)
    {
        $topic = Topic::findOrFail($topicId);
        $topic->createReply($request->user(), $request->only('body'));
        $topic->touch();
        return redirect("/topics/{$topicId}/view");
    }
}
