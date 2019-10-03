<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyQuote;
use App\Customer;
use App\Quote;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendemails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $customers = Customer::where('status', true)->where('paid', true)->get();

        foreach($customers as $customer) {
            
            if($customer->quote_id) {
                $nextQuote = Quote::where('id', '>', $customer->quote_id)->first();
                if($nextQuote) {
                    Mail::to($customer->email)->send(new DailyQuote($nextQuote));
                    $customer->update(['quote_id' => $nextQuote->id]);
                } else {
                    Mail::to($customer->email)->send(new DailyQuote(null));
                }
            } else {
                $quote = Quote::first();
                $customer->update(['quote_id' => $quote->id]);
                Mail::to($customer->email)->send(new DailyQuote($quote));
            }
            if(config('mail.host') == 'smtp.mailtrap.io') {
                sleep(5);
            }

        }
    }
}
