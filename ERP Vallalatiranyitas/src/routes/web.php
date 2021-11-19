<?php


use Illuminate\Support\Facades\Route;
use Admin\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Felhasznalokontroller;
use App\Http\Controllers\MassagesController;
use \User\NaptarController;
use \User\ProjektekController;
use App\Http\Controllers\SzabadsagolasController;
use PHPUnit\TextUI\XmlConfiguration\Group;
use \User\Profile;
use App\Models\Massages;


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

Route::get('/', function () {
    $uzenetek = Massages::where('fogado', '=', auth()->user()->name ?? 'none')->get();
    return view('index', compact('uzenetek'));
});





// Csak bejelentkezett elérések
Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function(){
    Route::get('profile', Profile::class)->name('profile');
    Route::get('naptar', NaptarController::class)->name('naptar');
    Route::get('projektek', ProjektekController::class)->name('projektek');
    Route::get('/projektek-show/{id}', 'User\ProjektekController@show')->name('projektek-show');
    Route::get('feladatok', 'User\FeladatokController')->name('feladatok');
    Route::get('felhasznalok', 'User\FelhasznalokController')->name('felhasznalok.felhasznalok');
    Route::post('profile_avatar', 'User\Profile@update_avatar');
    Route::get('/projektek-show/eszkoz/{id}', 'EszkozokController@vissza');
    Route::get('kirendeles', 'KirendelesController')->name('kirendeles');
    Route::get('/kirendeles/eszkoz/{id}', 'KirendelesController@kirendeles')->name('/kirendeles/eszkoz/{id}');
    Route::get('dokumentumok.index', 'DocumentController@index')->name('dokumentumok.index');
    Route::get('dokumentumok.create', 'DocumentController@create')->name('dokumentumok.create');
    Route::post('dokumentumok.store', 'DocumentController@store')->name('dokumentumok.store');
    Route::get('dokumentumok.show/{id}', 'DocumentController@show')->name('dokumentumok.show/{id}');
    Route::get('dokumentumok.download/{file}', 'DocumentController@download')->name('dokumentumok.download/{file}');
    Route::get('szabadsagolas.index', 'SzabadsagolasController@index')->name('szabadsagolas.index');
    Route::get('szabadsagolas.create', 'SzabadsagolasController@create')->name('szabadsagolas.create');
    Route::post('szabadsagolas.store', 'SzabadsagolasController@store')->name('szabadsagolas.store');
    Route::get('massages.index', 'MassagesController@index')->name('massages.index');
    Route::get('massages.create', 'MassagesController@create')->name('massages.create');
    Route::post('massages.store', 'MassagesController@store')->name('massages.store');
});

// Admin elérési utak
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
    Route::resource('projects', ProjectsController::class);
    Route::resource('eszkozok', EszkozokController::class);
    Route::resource('tasks', TasksController::class);
    Route::resource('esemenyek', EsemenyekController::class);
    Route::get('biralat.index', 'BiralatController@index')->name('biralat.index');
    Route::get('biralat.naplo', 'BiralatController@naplo')->name('biralat.naplo');
    Route::get('biralat.elfogad/{id}', 'BiralatController@elfogad')->name('biralat.elfogad/{id}');
    Route::get('biralat.elutasit/{id}', 'BiralatController@elutasit')->name('biralat.elutasit/{id}');
    Route::get('biralat.visszavon/{id}', 'BiralatController@visszavon')->name('biralat.visszavon/{id}');
});


