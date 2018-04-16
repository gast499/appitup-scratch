<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Idea;
class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCategory()
    {
        $category = factory(Category::class)->make();
        $category->save();
        $category2 = factory(Category::class)->make();
        $category2->save();
        $user = factory(\App\User::class)->create();
        $user->save();
        $user->categories()->attach($category->id);
        $user->categories()->attach($category2->id);
        $this->assertTrue(true);
}

public function testIdea()
{
    $idea = factory(Idea::class)->make();
    $idea->save();
    $idea2 = factory(Idea::class)->make();
    $idea2->save();
    $user = factory(\App\User::class)->create();
    $user->save();
    $user->ideas()->attach($idea->id);
    $user->ideas()->attach($idea->id);
    $this->assertTrue(true);    }
}
