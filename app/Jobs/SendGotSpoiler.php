<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Spoiler;
use App\PhoneNumber;
use App\Services\Twilio;

class SendGotSpoiler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $spoiler;

    protected $twilio;

    protected $phoneNumbers;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Twilio $twilio)
    {
        $this->spoiler = Spoiler::latest()->first();

        $this->phoneNumbers = PhoneNumber::all();

        $this->twilio = $twilio;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $twilio = $this->twilio;

        $this->phoneNumbers->map(function ($phoneNumber) use ($twilio) {
             $twilio->notify($phoneNumber->phone_number, $this->spoiler->message);
        });
    }
}
