<?php

namespace App\Console\Commands;

use App\Order;
use App\State\OrderStateContext;
use App\State\StateFactory;
use App\State\StateInterface;
use Illuminate\Console\Command;

class ProceedOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proceed:order {orderId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Proceed order to next state';

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
        $order = Order::findOrFail($this->input->getArgument('orderId'));
        $context = OrderStateContext::create();

        /** @var StateInterface $state */
        $state = StateFactory::getState($order->state);
        $context->setState($state);
        $context->next();

        $order->state = $context->getName();
        $order->save();

        $this->output->writeln('State was changed: '.$order->state);
        return 0;
    }
}
