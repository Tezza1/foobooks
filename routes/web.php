<?php

/**
* Book resource
*/
Route::get('/books', 'BookController@index')->name('books.index');
Route::get('/books/create', 'BookController@create')->name('books.create');
Route::post('/books', 'BookController@store')->name('books.store');
Route::get('/books/{title}', 'BookController@show')->name('books.show');
Route::get('/books/{title}/edit', 'BookController@edit')->name('books.edit');
Route::put('/books/{title}', 'BookController@update')->name('books.update');
Route::delete('/books/{title}', 'BookController@destroy')->name('books.destroy');

# The above routes *could* all be replaced with this one line:
# Route::resource('books', 'BookController');


/**
* Misc Pages
* A way to display simple, static pages that don't really need their own controller
*/
Route::get('/help', 'PageController@help')->name('page.help');
Route::get('/faq', 'PageController@faq')->name('page.faq');


/**
* Contact page
* Single action controller that contains a __invoke method, so no action is specified
* This page could also be taken care of via the PageController, it's up to you.
*/
Route::get('/contact', 'ContactController')->name('contact');


/**
* A quick and dirty way to set up a whole bunch of practice routes
* that I'll use in lecture.
*/
Route::get('/practice', 'PracticeController@index')->name('practice.index');
for($i = 0; $i < 100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}


/**
* Development related
*/
# Make it so the logs can only be seen locally
if(App::environment() == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}



/**
* Main homepage
*/
Route::get('/', function () {
    return view('welcome');
});
