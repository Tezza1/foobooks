<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BookController extends Controller
{

    /**
	*
	*/
    public function index()
    {
        return 'To do: Display a listing of all the books.';
    }

    /**
	* Get
	*/
    public function create()
    {
        return view('book.create');
    }

    /**
	* Post
	*/
    public function store(Request $request)
    {

        # Validate
        $this->validate($request, [
            'title' => 'required|min:3',
        ]);

        # If there were errors, Laravel will redirect the
        # user back to the page that submitted this request
        # The validator will tack on the form data to the request
        # so that it's possible (but not required) to pre-fill the
        # form fields with the data the user had entered

        # If there were NO errors, the script will continue...

        # Get the data from the form
        #$title = $_POST['title']; # Option 1) Old way, don't do this.
        $title = $request->input('title'); # Option 2) USE THIS ONE! :)

        # Here's where your code for what happens next should go.
        # Examples:
        # Save book in the database

        # When done - what should happen?

        # Beginner students - you should just return a view with a confirmation page; it's the easiest option.
        return view('book.store')->with(['title' => $title]);


        # More advanced students, there is the option of redirecting the user back to the page
        # they were on and display the message there.
        # If you need to send data with this redirect please refer to:
        # https://laravel.com/docs/5.3/redirects#redirecting-with-flashed-session-data

        # return redirect('/books/create');

    }


    /**
	*
	*/
    public function show($title)
    {
        return view('book.show')->with('title', $title);
    }


    /**
	*
	*/
    public function edit($id)
    {
        return 'To do: Show form to edit a book';
    }

    /**
	*
	*/
    public function update(Request $request, $id)
    {
        //
    }

    /**
	*
	*/
    public function destroy($id)
    {
        //
    }


    /**
	* This was example code I wrote in Lecture 7
    * It shows, roughly, what a controller action for your P3 might look like
    * It is not at all related to the Book resource.
	*/
    public function getLoremIpsumText(Request $request)
    {

        # Validate the request....

        # Generate the lorem ipsum text
        $howManyParagraphs = $request->input('howManyParagraphs');

        # Logic...
        $loremenator = \SBuck\Loremenator();
        $text = $loremenator->getParagraphs($howManyParagraphs);

        # Display the results...
        return view('lorem')->with(['text', $text]);

    }
}
