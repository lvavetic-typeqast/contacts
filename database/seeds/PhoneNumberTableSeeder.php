<?php

use Illuminate\Database\Seeder;
use App\Model\PhoneNumber;

class PhoneNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;

        factory(PhoneNumber::class, $count)->create()->each(function ($phone) {
            $phone->make();
        });
    }
}
