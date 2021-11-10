<?php


use Illuminate\Support\Facades\Route;
use Admin\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Felhasznalokontroller;
use \User\NaptarController;
use \User\ProjektekController;
use PHPUnit\TextUI\XmlConfiguration\Group;
use \User\Profile;

use App\Http\Controllers\User\SzabadsagolasController;

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
    return view('index');
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
    Route::get('kirendeles-vegrehajtas', 'KirendelesController@kirendeles')->name('kirendeles-vegrehajtas');
    Route::get('dokumentumok.index', 'DocumentController@index')->name('dokumentumok.index');
    Route::get('dokumentumok.create', 'DocumentController@create')->name('dokumentumok.create');
    Route::post('dokumentumok.store', 'DocumentController@store')->name('dokumentumok.store');
    Route::get('dokumentumok.show/{id}', 'DocumentController@show')->name('dokumentumok.show/{id}');
    Route::get('dokumentumok.download/{file}', 'DocumentController@download')->name('dokumentumok.download/{file}');
});

// Admin elérési utak
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
    Route::resource('projects', ProjectsController::class);
    Route::resource('eszkozok', EszkozokController::class);
    Route::resource('tasks', TasksController::class);
    Route::resource('esemenyek', EsemenyekController::class);
});


