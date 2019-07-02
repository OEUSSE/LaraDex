<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LaraDex\Mail\Welcome;
use LaraDex\Mail\Bienvenida;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'welcome');

Route::get('/prueba/{name}', 'PruebaController@prueba');

# Route for TrainerController Controller make with artisan
Route::resource('trainers', 'TrainerController');
Route::resource('pokemons', 'PokemonController');

# Lists Routes
Route::get('/list-trainers', 'ListTrainerController@index');
Route::get('/list-pokemons', 'ListPokemonController@index');
# Api Route
Route::get('/api/trainer', 'ListTrainerController@getData');
Route::get('/api/pokemon', 'ListPokemonController@getData');
Route::get('/searchComments', 'CommentsController@getComments');

# MailTest
Route::get('/sendMail', function () {
    /* $data = array('name' => 'Enviar correos');

    Mail::to('scr.eusse@gmail.com')
        ->send(new Welcome('Hola bienvenido')); */

    Mail::to('scr.eusse@gmail.com')
        ->send(new Bienvenida());

    return "Tu correo ha sido enviado";
});

Auth::routes();

// passport
Route::get('cliente', 'ClienteController@Index')->middleware('auth');
/* Route::get('cliente', function () {
    return view('client');
})->middleware('auth'); */

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('test')->group(function () {
    Route::get('test-exporte', 'TestController@ExportCsv');
});

# Test Routes
Route::prefix('home')->group(function() {
    # Use multiples http verbs in the same route
    Route::match(['get', 'post'], 'city', function() {
        return "GET -> POST para las ciudades";
    });
    # If it needs all http verbs it can use the any method
    Route::any('center', function() {
        return "All HTTP verbs can be used in this URI.";
    });

    # Redirect Routes (oldUrl, newUrl, statusCode).
    Route::get('direction', function () {
        return "Dirección.";
    });

    Route::get('address', function () {
        Debugbar::info('Hey');
        return "Nuevo espacio para la dirección.";
    });

    Route::redirect('direction', 'address', 301);

    # Show views
    Route::view('pokedex', 'pokedex.index', ['name' => 'Ash Ketchum', 'city' => 'Pueblo Paleta']);

    # Parameters
    Route::get('wild-pokemons/{from}/{to}', function($from, $to) {
        return "La cantidad de pokemons que se encontraron de $from km a $to km es de: ".(string)400;
    });

    # Optional Parameters
    Route::get('pokemon/{id?}', function ($idPokemon = 1) {
        return "El id del pokemon elegido es $idPokemon";
    });

    # Restringir el como se acceden a las rutas con RegExp
    Route::get('guest/{name?}', function($guestName = 'invitado') {
        return "Hola ".ucfirst($guestName)."!";
    })->where('name', '[A-Za-z]+');

    Route::get('poison/{id}', function($idPoison) {
        return "Posión $idPoison";
    })->where('id', '[0-9]+');

    Route::get('guest/{name}/poison/{id}', function($guestName, $idPoison) {
        return ucfirst($guestName)." tiene el veneno $idPoison";
    })->where(['name' => '[A-Za-z]+' ,'id' => '[0-9]+']);

    # La restricción de ésta ruta se esta manejando en RouteServiceProvider
    Route::get('official-police/{id}', function($idPolice) {
        return "Oficial de Policía $idPolice";
    });

    # Named Routes
    # El método name funciona como un apuntador, para acceder a esa ruta en otras rutas de una manera
    # mas legible.
    Route::get('user/profile', function() {
        // con route() se puede acceder a cualquier ruta nombrada
        return route('profile');
    })->name('profile');

    Route::get('usr/profile', function() {
        return redirect()->route('profile');
    });

    # Paso de parámetros con route a una una Named Route
    /* Route::get('user/{id}/profile', function($id) {
        return "Perfil de $id";
    })->name('perfil');

    $url = route('perfil', ['id' => 1]); */
});

# Route Groups
# Prefix
# El método prefix puede ser usado para agrupar rutas con un prefijo especificado.
Route::prefix('admin')->group(function () {
    Route::get('users', function() {
        // admin/users
        return "Bienvenido al administrador de usuarios.";
    });
});

# Implicit Binding

/* Route::get('profile/{user}', function(\LaraDex\User $user) {
    // Pasar como parámetro la instancia del modelo
});
 */
//Middleware
/* Route::get('profile/new', function(Request $request) {
    return "Bienvenido ".$request->name;
})->middleware('checkage'); */

Route::group(['middleware' => ['checkage']], function() {
    Route::get('profile/new', function(Request $request) {
        return "Bienvenido $request->name";
    });
});

// Consumir API
Route::get('/posts', 'ApiController@getPosts');
Route::post('/notify-slack', 'ApiController@notifySlack');

// Call CustomError
Route::get('exception/index', 'ExceptionController@index');

// Guardar un archivo en disco local FileSystem.
Route::prefix('filesystem')->group(function () {
    Route::get('local', 'FileSystemController@Local');
    Route::get('gcs', 'FileSystemController@GoogleCloudStorage');
});

// Log Error
Route::get('log', function () {
    /* Log::channel('slack')->emergency('test');
    Log::channel('slack')->alert('test');
    Log::channel('slack')->critical('test');
    Log::channel('slack')->error('test'); *//*
    Log::channel('slack')->warning('test');
    Log::channel('slack')->notice('test'); */
    Log::channel('slack')->warning('test');/*
    Log::channel('slack')->debug('test'); */
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
