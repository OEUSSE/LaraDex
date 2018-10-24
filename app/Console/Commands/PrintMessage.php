<?php

namespace LaraDex\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Crypt;
use stdClass;

class PrintMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:print';

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

    public function CryptExample() {
        $name = "Hector";
        $encryptedName = Crypt::encryptString($name);
        $decryptedName = Crypt::decryptString($encryptedName);

        dd([
            'nombre' => $name,
            'encriptado' => $encryptedName,
            'desencriptado' => $decryptedName
        ]);
    }

    public function HashExample() {
        $password = "micontrasena123";
        $hashedPassword = Hash::make($password, [ 'rounds' => 12 ]);

        // Si el hash necesita volver a generarse
        if (Hash::needsRehash($hashedPassword)) {
            $hashedPassword = Hash::make($password);
        }

        // Si el password coincide con su valor hasheado
        if (Hash::check($password, $hashedPassword)) {
            $this->info($hashedPassword);
        }
    }

    public function stdClass() {
        // Create an empty object
        $obj = new stdClass();
        $obj->id = 1;
        $obj->name = ucwords('maría');
        $obj->lastname = "Aguirre";
        $obj->age = 32;
        $obj->address = "Manizales";
        $obj->creationDate = now();

        dd($obj);
    }

    public function CarbonExample($action = '+') {
        $a = now(); // Obtiene YYYYMMDD HHMMSS
        $b = now()->format('Y-m-d'); // Obtiene YYYYMMDD

        $c = today(); // Devuelve la fecha actual y el tiempo en 00:00:00
        $d = now(); // Devuelve la fecha actual y el tiempo en el que se ejecutó.
        $e = Carbon::tomorrow(); // Devuelve la fecha actual mas un día y el tiempo en 00:00:00
        $f = Carbon::yesterday(); // Devuelve la fecha actual menos un día y el tiempo en 00:00:00

        $date = Carbon::parse($a);
        if ($action === '+') {
            $date->addDay(1);
        } else if ($action === '-') {
            $date->subDay(1);
        }

        $dt = date('Y-m-d', strtotime($date));
        $Dt = Carbon::parse($date)->format('Y-m-d');

        $weekday_num = Carbon::parse($date)->format('w'); // Numero del dia de la semana - Lunes -> 1

        // De esta forma no se muta el resultado
        $tomorrow = Carbon::parse($a)->addDay(1);
        $yesterday = Carbon::parse($a)->subDay(1);

        $next_week = Carbon::parse($a)->addWeeks(1);
        $past_week = Carbon::parse($a)->subWeeks(1);



        $diff_hours = $a->diffInHours($tomorrow); // Diferencia en horas entre dos fechas dadas

        $europe_time = now('Europe/London');

        $this->info(Carbon::yesterday());
    }


    public function GetContentFileExample() {

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info($this->CarbonExample());
    }
}
