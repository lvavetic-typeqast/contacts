<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

     /**
     * Test create contact
     *
     * @return void
     */
    public function testCreateContact()
    {
        $array = [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'is_favorite' => null,
        ];

        $response = $this->json('POST', 'api/contact/', $array);

        $response
            ->assertStatus(201)
            ->assertJsonFragment([
                'firstname' => $array['firstname'],
                'lastname' => $array['lastname'],
            ]);
    }
}