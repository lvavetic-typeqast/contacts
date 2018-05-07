<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    /**
     * Test index method in ContactController
     *
     * @return void
     */
    public function testIndexMethod()
    {        
        $reponse = $this->get('/contacts');
        
        $reponse->assertStatus(200);
    }   
}
