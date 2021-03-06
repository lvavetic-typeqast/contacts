<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\Contact;

class ContactTest extends TestCase
{
    use RefreshDatabase;

     /**
     * Test Contact Controller insert method
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
     * test Contact Controller show method
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
     * test Contact Controller index method
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

    /**
     * test Contact Controller update method
     *
     * @return void
     */
    public function testUpdateContact()
    {
        factory(Contact::class, 30)->create();

        $contact = Contact::first();

        $array = [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'is_favorite' => null,
        ];

        $route = 'api/contact/'.$contact->id.'/';

        $response = $this->json('PUT', $route, $array);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'email' => $array['email'],
                'lastname' => $array['lastname'],
            ]);
    }

     /**
     * test Contact Controller delete method
     *
     * @return void
     */
    public function testDeleteContact()
    {
        factory(Contact::class, 30)->create();

        $contact = Contact::first();

        $route = 'api/contact/'.$contact->id.'/';

        $response = $this->json('DELETE', $route);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'email' => $contact->email,
                'firstname' => $contact->firstname,
            ]);
    }
}