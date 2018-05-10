<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\Contact;

class ContactTest extends TestCase
{
    use RefreshDatabase;

     /**
     * Test contact insert method
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

    /**
     * Contact Controller show method
     *
     * @return void
     */
    public function testShowContact()
    {
        factory(Contact::class, 30)->create();

        $contact = Contact::first();

        $route = 'api/contact/'.$contact->id.'/';

        $response = $this->json('GET', $route);

        $response
            ->assertStatus(200);
    }

    /**
     * Contact Controller index method
     *
     * @return void
     */
    public function testIndexContact()
    {
        factory(Contact::class, 30)->create();

        $contact = Contact::first();

        $response = $this->json('GET', 'api/contacts/');

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'firstname' => $contact->firstname,
                'lastname' => $contact->lastname,
            ]);
    }
}