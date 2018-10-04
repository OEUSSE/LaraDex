<?php

namespace LaraDex\Console\Commands;

use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use LaraDex\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--name} {name} {--email} {email} {--password} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear un usuario';

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
        $data = response()->json($this->arguments())->getData();
        
        $newUser = new User();
        $newUser->name = $data->name;
        $newUser->email = $data->email;
        $newUser->password = Hash::make($data->password);
        
        if ($newUser->save()) {
            $this->info('Usuario guardado');
        } else {
            $this->info('Usuario no guardado');
        }
    }
}
