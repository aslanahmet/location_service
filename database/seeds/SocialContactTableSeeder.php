<?php

use Illuminate\Database\Seeder;

class SocialContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User\SocialContact::class, 100)->create();
    }
}
