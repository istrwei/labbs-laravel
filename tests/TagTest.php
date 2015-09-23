<?php

use App\User;
use App\Tag;

class TagTest extends TestCase
{
    public function testViewTags()
    {
        $this->visit('/tags')
             ->assertResponseOk();
    }

    public function testCreateTopic()
    {
        $this->actingAs(factory(User::class)->create());

        $this->visit('/tags/create')
             ->type('Tag Name', 'name')
             ->type('Tag Description', 'description')
             ->press('Create')
             ->see('Tag Name')
             ->see('Tag Description');
    }

    public function testViewTag()
    {
        $tag = factory(Tag::class)->create();

        $this->visit("/tags/{$tag->id}")
             ->see($tag->title)
             ->see($tag->body);
    }
}
