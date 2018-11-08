<?php
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'category_id' => '1',
            'product_id' => '1',
            'parking_id' => '1',
            'user_id' => '1',
            'quantity' => '1',
            'unit_price' => '3.90',
            'total_price' => '3.90',
            'delay' => 'J+1',
            'status' => 'created',
            'customer_comment' => '',
            'feedback' => '',
        ]);
        Order::create([
            'category_id' => '1',
            'product_id' => '1',
            'parking_id' => '1',
            'user_id' => '2',
            'quantity' => '1',
            'unit_price' => '3.90',
            'total_price' => '3.90',
            'delay' => 'J+1',
            'status' => 'cancelled',
            'customer_comment' => '',
            'feedback' => '',
        ]);
        Order::create([
            'category_id' => '1',
            'product_id' => '1',
            'parking_id' => '1',
            'user_id' => '1',
            'quantity' => '1',
            'unit_price' => '3.90',
            'total_price' => '3.90',
            'delay' => 'J+1',
            'status' => 'accepted',
            'customer_comment' => '',
            'feedback' => '',
        ]);
        Order::create([
            'category_id' => '1',
            'product_id' => '1',
            'parking_id' => '1',
            'user_id' => '2',
            'quantity' => '1',
            'unit_price' => '3.90',
            'total_price' => '3.90',
            'delay' => 'J+1',
            'status' => 'waiting_admin',
            'customer_comment' => '',
            'feedback' => '',
        ]);
        Order::create([
            'category_id' => '1',
            'product_id' => '1',
            'parking_id' => '1',
            'user_id' => '1',
            'quantity' => '1',
            'unit_price' => '3.90',
            'total_price' => '3.90',
            'delay' => 'J+1',
            'status' => 'waiting_user',
            'customer_comment' => '',
            'feedback' => '',
        ]);
        Order::create([
            'category_id' => '1',
            'product_id' => '1',
            'parking_id' => '1',
            'user_id' => '2',
            'quantity' => '1',
            'unit_price' => '3.90',
            'total_price' => '3.90',
            'delay' => 'J+1',
            'status' => 'finished',
            'customer_comment' => '',
            'feedback' => '',
        ]);
        Order::create([
            'category_id' => '1',
            'product_id' => '1',
            'parking_id' => '1',
            'user_id' => '2',
            'quantity' => '1',
            'unit_price' => '3.90',
            'total_price' => '3.90',
            'delay' => 'J+1',
            'status' => 'billed',
            'customer_comment' => '',
            'feedback' => '',
        ]);
    }
}

