<?php

use Illuminate\Database\Seeder;

class VenueLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Venue\VenueLocation::class, 50)->create();
    }
}
