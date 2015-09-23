<?php

use App\User;
use App\Topic;
use App\Tag;

class TopicTest extends TestCase
{
    public function testViewTopics()
    {
        $this->visit('/topics')
             ->assertResponseOk();
    }

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

    public function testAddTag()
    {
        $this->actingAs(factory(User::class)->create());

        $topic = factory(Topic::class)->create();
        $tag = factory(Tag::class)->create();

        $this->visit("/topics/{$topic->id}/tags/add")
             ->select($tag->id, 'tag')
             ->press('Add')
             ->see($tag->name);
    }
}
