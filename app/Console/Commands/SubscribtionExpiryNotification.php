<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Carbon\Carbon;
use App\Jobs\SendSubscribtionExpireMessageJob;
class SubscribtionExpiryNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:SubscribtionExpiryNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chceck customers subscription expiry date ';

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
     * @return int
     */
    public function handle()
    {

        $expired_customers = Customer::where('subscribtion_end_date','<',now())->get();

        foreach($expired_customers as $customer){

            $expire_date = Carbon::createFromFormat('Y-m-d', $customer->subscribtion_end_date)->toDateString();
             
            dispatch(new SendSubscribtionExpireMessageJob($customer,$expire_date));
        }
    }
}
