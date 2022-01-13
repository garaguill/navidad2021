<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\EditorialController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Mail\BibliotecaMailable;
use Illuminate\Support\Facades\Mail;




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
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $gUser = Socialite::driver('google')->user();
    $user = User::firstOrCreate(
        [
            'email' => $gUser->getEmail(),
        ],
        [
            'external_id' => $gUser->getId(),
            'name' => $gUser->getName(),
        ]
    );
    auth()->login($user, true);
    return view('dashboard');

    // $user->token
});
Route::get('/auth/twitter/redirect', function () {
    return Socialite::driver('twitter')->redirect();
});

Route::get('/auth/twitter/callback', function () {
    $tUser = Socialite::driver('twitter')->user();
    $user = User::firstOrCreate(
        [
            'email' => $tUser->getEmail(),
        ],
        [
            'external_id' => $tUser->getId(),
            'name' => $tUser->getName(),
        ]
    );
    auth()->login($user, true);
    return view('dashboard');

    // $user->token
});


Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', function () {
    $ghUser = Socialite::driver('github')->user();
    $user = User::firstOrCreate(
        [
            'email' => $ghUser->getEmail(),
        ],
        [
            'external_id' => $ghUser->getId(),
            'name' => $ghUser->getName(),
        ]
    );
    auth()->login($user, true);
    return view('dashboard');

    // $user->token
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('socios', 'App\Http\Controllers\SocioController');
Route::get("libros/pdf",[LibroController::class, 'listadoPdf'])->name("libros.pdf");
Route::get("libros/listado/{autor_id}",[LibroController::class, 'listado']);

Route::resource('libros', 'App\Http\Controllers\LibroController');

Route::resource('autores', 'App\Http\Controllers\AutorController');
Route::resource('prestamos', 'App\Http\Controllers\PrestamoController');
Route::resource('editoriales', 'App\Http\Controllers\EditorialController');

Route::get('email', function(){
    $correo = new BibliotecaMailable;
    Mail::to('garaguillen.97@gmail.com')->send($correo);
    return "Mensaje enviado";
});



