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

    public function testIndex(){
        $this->json('GET',$this->route);
        $this->assertResponseOk();
        $this->assertResponseState(200);
        $this->seeJson([
            'code' => '1',
        ])->seeJson;
    }
}
