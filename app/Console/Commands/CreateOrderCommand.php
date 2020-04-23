<?php

namespace App\Console\Commands;

use App\Order;
use App\Product;
use App\State\OrderStateContext;
use Illuminate\Console\Command;

class CreateOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:order {productId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $productId = $this->input->getArgument('productId');

        $product = Product::findOrFail($productId);
        $order = new Order();
        $order->product()->associate($product);

        $state = OrderStateContext::create();
        $order->state = $state->getName();

        $order->save();


        $this->output->writeln('Order ID:'. $order->id);

        return 0;
    }
}
