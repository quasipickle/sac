<?php

use Illuminate\Database\Seeder;
use App\Term;
class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $terms = ["W" => "Winter", "F" => "Fall",
          "S" => "Spring", "U" => "Summer"];

      foreach($terms as $key=>$description){
          try{
              $term = new Term();
              $term['code'] = $key;
              $term['description'] = $description;
              $term->save();
          } catch(Exception $e){
              print($description." already exists.\n");
          }
      }

    }
}
