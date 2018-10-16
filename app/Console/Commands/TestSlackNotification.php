<?php

namespace LaraDex\Console\Commands;

use Illuminate\Console\Command;
use LaraDex\User;
use LaraDex\Notifications\NotifySlack;

class TestSlackNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:slack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Slack notification for new errrs';

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
        User::first()->notify(new NotifySlack());
    }
}
