<?php

namespace LaraDex\Console\Commands;

use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use LaraDex\User;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update {--id} {id} {--name} {name?} {--email} {email?} {--password} {password?}';

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
        $data = User::find($this->argument('id'));
        $dataMod = response()->json($this->arguments())->getData();
        
        $idUser = (int)$dataMod->id;
        $nameUser = ($dataMod->name) ? $dataMod->name : $data->name;
        $emailUser = ($dataMod->email) ? $dataMod->email : $data->email;
        $password = ($dataMod->password) ? Hash::make($dataMod->password) : $data->password;
        
        $res = User::where('id', $this->argument('id'))
            ->update([
                'name' => $nameUser,
                'email' => $emailUser,
                'password' => $password
            ]);

        if (!empty($res)) {
            $this->info('Actualizado');
        } else {
            $this->info('No se pudo actualizar');
        }
    }
}
