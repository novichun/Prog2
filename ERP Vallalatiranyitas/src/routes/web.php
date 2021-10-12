<?php


use Illuminate\Support\Facades\Route;
use Admin\UserController;
use App\Http\Controllers\NaptarController;
use PHPUnit\TextUI\XmlConfiguration\Group;
use \User\Profile;

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
    Route::get('naptar', 'User\NaptarController')->name('naptar');
    Route::post('profile_avatar', 'User\Profile@update_avatar');
    
});

// Admin elérési utak
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
    Route::resource('projects', ProjectsController::class);
    Route::resource('tasks', TasksController::class);
});


