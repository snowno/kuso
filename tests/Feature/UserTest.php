<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    public function setUp(){
        parent::setUp();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTrue()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEmpty()
    {
        $track = [];
        $this->assertEmpty($track);

        return $track;
    }



    public function testPop(){
        $stack = [];
        $this->assertEquals(0,count($stack));

        array_push($stack,'foo');
        $this->assertEquals('foo',$stack[0]);

        $this->assertEquals(1,count($stack));

        array_pop($stack);
        $this->assertEquals(0,count($stack));
    }


}
