<?php

use App\User;
use App\Topic;

class ReplyTest extends TestCase
{
    public function testCreateReply()
    {
        $this->actingAs(factory(User::class)->create());
        $topic = factory(Topic::class)->create();

        $this->visit("/topics/{$topic->id}")
             ->type('Reply Body', 'body')
             ->press('Reply')
             ->see('Reply Body');
    }
}
