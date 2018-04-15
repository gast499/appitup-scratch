<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class IdeaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $category = factory(Category::class)->make();
        $category->save();
        $idea = factory(\App\Models\Idea::class)->create();
        $idea->save();
        $idea->categories()->attach($category->id);
        $this->assertTrue(true);
    }
}
