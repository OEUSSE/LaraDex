<?php

namespace LaraDex\Console\Commands;

use LaraDex\User;
use Illuminate\Console\Command;

class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lista los usuarios existentes';

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
        $users = User::all(['id', 'name', 'email'])->toArray();
        $progressBar = $this->output->createProgressBar(count($users));

        $headers = ['Id', 'Nombre', 'Correo'];
        $this->table($headers, $users);
        /* foreach ($users as $user) {        
            $progressBar->advance();
        } */
        
        $progressBar->advance();
        $progressBar->finish();
    }
}
