<?php

use Illuminate\Database\Seeder;
use App\Model\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;

        factory(Contact::class, $count)->create()->each(function ($contact) {
            $contact->make();
        });
    }
}
