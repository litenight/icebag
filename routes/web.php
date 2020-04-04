<?php

use App\Priority;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->get('/', function () {
    cache()->flush();

    return view('welcome', [
        'priorities' => Priority::all()
    ]);
});

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/tickets/{priority?}', 'HomeController')
    ->middleware('auth')
    ->name('home');

Route::get('/tickets/{priority}/{ticket}', 'TicketController@show')->name('tickets.show');

Route::get('/tickets/{priority}/{ticket}/{status}', 'TicketController@update')->name('tickets.update');

Route::post('/tickets', 'TicketController@store')->name('tickets.store');

Route::delete('/tickets//{ticket}', 'TicketController@destroy')->name('tickets.destroy');

Route::post('/tickets/find', 'TicketController@find')->name('tickets.find');

Route::post('/messages/{ticket}', 'MessageController@store')->name('messages.store');

Route::get('/search', 'SearchController@index')->name('tickets.search');

Route::get('/success/{token}', function (string $token) {
    if (! $token) {
        return redirect()->route('welcome');
    }

    return view('success', ['link' => cache('link')]);
})->name('success');
