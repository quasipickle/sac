<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ["Paper", "Poster", "Art", "Music", "Drama"];
        foreach($types as $type){
            try{
				Type::create(['description' => $type]);
			}
			catch(Exception $e){
				print($description." already exists.\n");
			}
        }
    }


}
