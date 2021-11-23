<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
        'code' => 'C00002',
        'name' => 'Customer2',
        'email' => 'customer2@gmail.com',
        'username' => 'customer02',
        'password' => bcrypt('123customer2')
        ]);
    }
}
