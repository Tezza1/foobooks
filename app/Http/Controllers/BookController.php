<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use Session;

class BookController extends Controller
{

    /**
	*
	*/
    public function index()
    {
        $books = Book::all();
        return view('book.index')->with(['books' => $books]);
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
            'published' => 'required|min:4|numeric',
            'cover' => 'required|url',
            'purchase_link' => 'required|url',
        ]);

        # Add the new book to the database
        $book = new Book();
        $book->title = $request->input('title');
        $book->published = $request->input('published');
        $book->cover = $request->input('cover');
        $book->purchase_link = $request->input('purchase_link');
        $book->save();

        Session::flash('flash_message', 'The book '.$book->title.' was added.');

        return redirect('/books');

    }


    /**
	*
	*/
    public function show($id)
    {
        return view('book.show')->with('title', $id);
    }


    /**
	*
	*/
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit')->with(['book' => $book]);
    }

    /**
	*
	*/
    public function update(Request $request, $id)
    {

        # Validate
        $this->validate($request, [
            'title' => 'required|min:3',
            'published' => 'required|min:4|numeric',
            'cover' => 'required|url',
            'purchase_link' => 'required|url',
        ]);

        # Find the book we want to update
        $book = Book::find($request->id);

        # Update
        $book->title = $request->title;
        $book->cover = $request->cover;
        $book->published = $request->published;
        $book->purchase_link = $request->purchase_link;
        $book->save();

        # Finish
        Session::flash('flash_view', ['book_edits_saved', ['title' => $book->title]]);
        return redirect('/books');
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
