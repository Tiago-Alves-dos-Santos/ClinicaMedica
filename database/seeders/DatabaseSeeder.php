<?php

namespace Database\Seeders;

use App\Models\Recepcionista;
use Illuminate\Database\Seeder;
use Database\Seeders\Cid10\Cid10TableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        //Recepcionista::factory(30)->create();
        $this->call(Cid10TableSeeder::class);
    }
}
