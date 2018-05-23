<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Customer', 10)->create()
            ->each(function($customer){
                //Make for each customer few transactions
                factory('App\Transaction', rand(1, 10))
                    ->create(['customerId'=>$customer->id]);
            });
    }
}
