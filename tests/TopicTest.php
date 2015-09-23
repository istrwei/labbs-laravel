<?php

use App\User;
use App\Topic;

class TopicTest extends TestCase
{
    public function testCreateTopic()
    {
        $this->actingAs(factory(User::class)->create());

        $this->visit('/topics/create')
             ->type('Topic Title', 'title')
             ->type('Topic Body', 'body')
             ->press('Create')
             ->see('Topic Title')
             ->see('Topic Body');
    }

    public function testViewTopic()
    {
        $topic = factory(Topic::class)->create();

        $this->visit("/topics/{$topic->id}")
             ->see($topic->title)
             ->see($topic->body);
    }
}
