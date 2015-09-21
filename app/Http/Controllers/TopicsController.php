<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Topic;

class TopicsController extends Controller
{
    /**
     * @return Response
     */
    public function showLatestTopics()
    {
        return view('topics.latest', [
            'topics' => Topic::getLatestTopics()
        ]);
    }
}
