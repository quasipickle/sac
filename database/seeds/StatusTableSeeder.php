<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $statuses = ["S" => "Saved", "P" => "Pending Approval",
            "A" => "Approved", "D" => "Declined"];
        
        foreach($statuses as $key=>$description){
            try{
                $status = new Status();
                $status['id'] = $key;
                $status['description'] = $description;
                $status->save();
            } catch(Exception $e){
                print($description." already exists.\n");
            }
        }
    }
}
