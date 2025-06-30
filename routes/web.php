 <?php


use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Cour;



Route::middleware(['auth'])->prefix('/cours')->name('cours.')->controller(CourController::class)->group(function(){

//Route::prefix('/cours')->name('cours.')->controller(CourController::class)->group(function(){

    Route::get('','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{cour}','show')->name('show');
    Route::get('/{cour}/edit','edit')->name('edit');
    Route::put('/{cour}','update')->name('update');
    Route::delete('/{cour}','destroy')->name('destroy');
    

    
});

Route::resource('users',UserController::class);
Route::resource('cours',CourController::class);

Route::middleware(['auth'])->post('/logout', [LoginController::class,'logout'])->name('logout');

//Route::resource('cours',CourController::class);
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('login');










