<?php

namespace LaraDex\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ListUsers::class,
        Commands\CreateUser::class,
        Commands\UpdateUser::class,
        Commands\DeleteUser::class,
        Commands\PrintMessage::class,
        Commands\TestSlackNotification::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $res = $schedule
                ->command('hello:print')
                ->everyMinute();

                
        \Log::info("Log de hello:print".\Carbon\Carbon::now());

    } 

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
