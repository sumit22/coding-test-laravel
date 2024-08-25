<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Database\Factories\CustomerFactory;
use Database\Factories\OrderFactory;
use Database\Factories\OrderItemFactory;
use Database\Factories\ProductFactory;
use Illuminate\Console\Command;

class SeedData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private CustomerFactory $customerFactory;
    private OrderFactory $orderFactory;
    private ProductFactory $productFactory;
    private OrderItemFactory $itemFactory;


    /**
     * Execute the console command.
     */
    public function handle(
        CustomerFactory $customerFactory, 
        ProductFactory $pFactory, 
        OrderFactory $orderFactory, 
        OrderItemFactory $itemFactory
    )
    {

        Customer::truncate();
        Customer::factory(100)->create();

        Product::truncate();
        Product::factory(100)->create();


        $customers = Customer::query()->limit(50)->get();

        Order::truncate();
        OrderItem::truncate();


        foreach($customers as $customer) {

            //dump($customer);

            $order = new Order();
            $order->customer_id = $customer->id;

            $order->save();

            $itemsNumbers = fake()->numberBetween(1,10);

            $itemIds = $this->getUniqueRandomNumbers($itemsNumbers);

            foreach($itemIds as $itemId)
            {
                $orderLineItem = new OrderItem();
                $orderLineItem->order_id = $order->id;
                $orderLineItem->product_id = $itemId;
                $orderLineItem->quantity = fake()->numberBetween(1,10);

                $orderLineItem->save();
            }

            
        }



    }function getUniqueRandomNumbers($n)
    {
        
        $randomNumbers = [];
    
        while (count($randomNumbers) < $n) {
            $randomNumber = fake()->numberBetween(1, 100);
            // Only add the number if it's not already in the array
            if (!in_array($randomNumber, $randomNumbers)) {
                $randomNumbers[] = $randomNumber;
            }
        }
        return $randomNumbers;
    }
}
