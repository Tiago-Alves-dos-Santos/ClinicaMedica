<?php

namespace Database\Seeders\Cid10;

use App\Models\Cid;
use Illuminate\Database\Seeder;

class Cid10TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cids = (array) json_decode(file_get_contents(database_path('seeders/cid10/cid.json')));
        
        $inserts = [];

        foreach ($cids as $cid){
            array_push($inserts, (array) $cid);
        }

        Cid::insert($inserts);
    }
}
