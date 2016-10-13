<?php

/**
* Book resource
*/
# Index page to show all the books
Route::get('/books', 'BookController@index')->name('books.index');

# Show a form to create a new book
Route::get('/books/create', 'BookController@create')->name('books.create');

# Process the form to create a new book
Route::post('/books', 'BookController@store')->name('books.store');

# Show an individual book
Route::get('/books/{title}', 'BookController@show')->name('books.show');

# Show form to edit a book
Route::get('/books/{title}/edit', 'BookController@edit')->name('books.edit');

# Process form to edit a book
Route::put('/books/{title}', 'BookController@update')->name('books.update');

# Delete a book
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
