<?php

use App\User;
use App\Topic;

class TopicTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Session::start();
    }

    public function testCreateTopic()
    {
        $this->actingAs(factory(User::class)->create());

        $this->visit('/topics/create')
             ->type('Topic Title', 'title')
             ->type('Topic Body', 'body')
             ->press('Create')
             ->seePageIs('/');
    }

    public function testViewTopic()
    {
        $topic = factory(Topic::class)->create();

        $this->visit("/topics/{$topic->id}/view")
             ->see($topic->title)
             ->see($topic->body);
    }
}
