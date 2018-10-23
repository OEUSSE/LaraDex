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
    protected $description = 'Test Slack notification for new errors';

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
        $data = [
            "text" => "*Lugar*: {$exception->getFile()}.\n*Linea*: {$exception->getLine()}",
            "title" => 'Excepción: '.$exception->getMessage(),
            "pretext" => '*CronAgenda* - _Ejecución de comandos_',
            "color" => 'd50200',
            "mrkdwn_in" => ["text", "pretext"]
        ];

        User::first()->notify(new NotifySlack());
    }
}
