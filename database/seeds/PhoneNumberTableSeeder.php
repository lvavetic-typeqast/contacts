<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Model\Contact;

class PhoneNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $contactIds = Contact::all()->pluck('id')->toArray();
        
        foreach (range(1,50) as $index) {
            DB::table('phone_number')->insert([
                'contact_id' => $faker->randomElement($contactIds),
                'number' => $faker->phoneNumber,
                'label' => $faker->word,
            ]);
        }
    }
}
