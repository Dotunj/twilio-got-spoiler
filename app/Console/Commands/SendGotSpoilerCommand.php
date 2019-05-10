<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendGotSpoiler;

class SendGotSpoilerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-got-spoiler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Game of Thrones Spoiler';

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
    public function handle(SendGotSpoiler $sendGotSpoiler)
    {
        $sendGotSpoiler->handle();

        $this->comment('Hehe, Spoilers have been sent');
    }
}
