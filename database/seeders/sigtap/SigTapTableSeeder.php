<?php
namespace Database\Seeders\sigtap;


use App\Models\SigTap;
use Illuminate\Database\Seeder;

class SigTapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sigtaps = (array) json_decode(file_get_contents(database_path('seeders/sigtap/sigtap.json')));

        //para grande valor de inserção em massa, que da erro, use o array chunk que subdiveem mais arrays
        foreach (array_chunk($sigtaps,100) as $sigtap){
            foreach($sigtap as $value){
                SigTap::insert((array) $value);
            }
        }
    }
}
