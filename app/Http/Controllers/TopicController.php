<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Topic;
use App\Reply;
use App\Tag;

class TopicController extends Controller
{
    public function showCreateTopic()
    {
        return view('topic.create');
    }

    public function create(Request $request)
    {
        $topic = Topic::createTopic($request->user(), $request->only('title', 'body'));
        return redirect("/topics/{$topic->id}");
    }

    public function showAddTag($topicId)
    {
        $topic = Topic::findOrFail($topicId);
        return view('topic.addTag', [
            'topic' => $topic,
            'tags' => Tag::getAllTags()
        ]);
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
        return redirect("/topics/{$topicId}");
    }

    public function addTag(Request $request, $topicId)
    {
        $topic = Topic::findOrFail($topicId);
        $topic->addTag(Tag::findOrFail($request->input('tag')));
        return redirect("/topics/{$topicId}");
    }
}
