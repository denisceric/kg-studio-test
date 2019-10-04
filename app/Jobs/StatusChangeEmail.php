<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusChange;

class StatusChangeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer;

    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    public function handle()
    {
        if(config('mail.host') == 'smtp.mailtrap.io') {
            sleep(5);
        }
        $msg = $this->customer->status;
        Mail::to($this->customer->email)->send(new StatusChange($msg));
    }
}
