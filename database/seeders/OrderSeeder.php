<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{

    public function run()
    {
        $orders = Order::factory(50)->create();
        foreach ($orders as $order) {
            $j=rand(1,6);
            for($i=0;$i<$j;$i++){
            DB::table('order_product')->insert([
                'order_id'=>$order->id,
                'product_id'=>Product::all()->unique()->random()->id,
                'quantity' =>  rand(1,12),
            ]);
            }
        }
    }
}
