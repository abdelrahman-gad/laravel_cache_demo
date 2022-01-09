<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;

class SendSubscribtionExpireMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Customer $customer;
    private $expireDate;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Customer $customer,$expireDate)
    {


        $this->customer = $customer;
        $this->expireDate = $expireDate;

    }



    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      sendMail('emails.subscribtion.expiration',$this->customer->email,'subscription expired',$this->customer);
    }
}
