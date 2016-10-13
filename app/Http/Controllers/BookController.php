<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'To do: Display a listing of all the books.';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    # PHP Doc Blocks

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        # Validate
        $this->validate($request, [
            'title' => 'required|min:3|alpha_num',
        ]);

        # If there were errors, Laravel will redirect the
        # user back to the page that submitted this request

        # If there were NO errors, the code will continue...


        # ----- BAD DATA WONT GET PAST THIS POINT ----

        # Option 1) OLD WAY< NOOOO
        #$title = $_POST['title'];

        # Option 2) USE THIS ONE! :)
        $title = $request->input('title');





        # Imagine: There's code here to enter the book into the database
        # Imagine: There's code here that generates the user's lorem ipsum

        # Print the results:
        return \Redirect::to('/books/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        return view('book.show')->with('title', $title);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'To do: Show form to edit a book';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getLoremIpsumText(Request $request) {

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
