<?php
  
use Illuminate\Database\Seeder;
use App\Bank;
   
class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'title' => 'Bank 1',
        ]);
        Bank::create([
            'title' => 'Bank 2',
        ]);
        Bank::create([
            'title' => 'Bank 3',
        ]);
    }
}



