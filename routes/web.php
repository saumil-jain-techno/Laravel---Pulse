<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Jobs\TestJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/fakelogins',function(){
    $users = User::all();
    $base_url = 'http://127.0.0.1:8000';


    foreach ($users as $user){
        Http::get("{$base_url}/fakelogin/{$user->id}");
    }

    return "Request Complete";
});

Route::get('/fakelogin/{user}',function(User $user){
    $base_url = 'http://127.0.0.1:8000';
    Auth()->login($user);

    Http::get("{$base_url}/dashboard}");

    Auth()->logout();
});

require __DIR__.'/auth.php';

Route::middleware(['auth','verified'])->get('/job',function(){
    TestJob::dispatch();
});

Route::get('/cache',function(){

    $value = Cache::remember('users', 5, function () {
        return User::all();
    });
    return $value;
});

Route::get('/cache2',function(){

    $value = Cache::remember('userscount', 5, function () {
        return User::count();
    });
    return $value;
});

Route::get('/cache/{user}',function(User $user){

    $value = Cache::remember("user:{$user->id}", 5, function () {
        return User::all();
    });
    return $value;
});
