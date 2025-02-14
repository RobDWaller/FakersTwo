<?php

use Illuminate\Database\Seeder;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscription_types')->insert([
            ['type' => 'basic'],
            ['type' => 'premium'],
            ['type' => 'agency']
        ]);
    }
}
