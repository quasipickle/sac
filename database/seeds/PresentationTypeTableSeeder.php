<?php

use Illuminate\Database\Seeder;
use App\PresentationType;

class PresentationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presentation_types = ["Paper", "Poster", "Art", "Music", "Drama"];
        foreach($presentation_types as $type){
            try{
				PresentationType::create(['description' => $type]);
			}
			catch(Exception $e){
				print($description." already exists.\n");
			}
        }
    }


}
