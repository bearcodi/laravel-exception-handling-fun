<?php
use App\User;
use App\Error;
use Faker\Factory;
use App\Exceptions\RecordableException;
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
    return view('welcome');
});

Route::get('/thrown', function() {
    throw new RecordableException(Factory::create()->sentence, 500);
});

Route::get('/wrapped', function() {
    try {
        User::create(['email' => 'kong@kong.com']);
    } catch (Exception $e) {
        
        throw new RecordableException($e->getMessage(), $e->getCode(), $e);
    }
});

Route::get('/errors', function() {
    $errors = Error::latest()->get();
    return view('errors.index', compact('errors'));
});