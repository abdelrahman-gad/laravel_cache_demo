<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
         Customer::factory(5)->create();
          $customers = Customer::all();
         foreach($customers as $customer){
             $customer->national_id=$customer->id+1000;
             $customer->save();
         }
    }
}
