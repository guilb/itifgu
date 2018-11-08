<?php
use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoicesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoice::create([
            'number' => '1111111',
            'parking_id' => '1',
            'user_id' => '1',
            'date' => '2018-10-11',
        ]);
        Invoice::create([
            'number' => '1111112',
            'parking_id' => '1',
            'user_id' => '1',
            'date' => '2018-10-15',
        ]);
        Invoice::create([
            'number' => '1111113',
            'parking_id' => '1',
            'user_id' => '1',
            'date' => '2018-10-31',
        ]);     
    }
}

