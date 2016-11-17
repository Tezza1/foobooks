<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Rych\Random\Random;
use App\Utilities\Quote;
use Carbon;
use DB;
use App\Book;

# Access via /practice/#

class PracticeController extends Controller
{

    /**
	* Demonstrating querying on the Collection rather than the DB
	*/
    public function example15() {

        /*
        2 separate queries on the database:
        */
        $books = Book::orderBy('id','descending')->get(); # Query DB
        $first_book = Book::orderBy('id','descending')->first(); # Query DB
        dump($books);
        dump($first_book);

        /*
        1 query on the database, 1 query on the collection (better):
        */
        $books = Book::orderBy('id','descending')->get(); # Query DB
        $first_book = $books->first(); # Query Collection
        dump($books);
        dump($first_book);

    }


    /**
	* Demonstrating magic methods of Collections
	*/
    public function example14() {

        $books = Book::all();
        foreach($books as $book) {
            #echo $book->title;
            echo $book['title'];
        }

    }


    /**
    * Delete a book via the Book model
    */
    public function example13() {

        # First get a book to delete
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        # If we found the book, delete it
        if($book) {

            # Goodbye!
            $book->delete();

            return "Deletion complete; check the database to see if it worked...";

        }
        else {
            return "Can't delete - Book not found.";
        }

    }


    /**
    * Update a book via the Book model
    */
    public function example12() {

        # First get a book to update
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        # If we found the book, update it
        if($book) {

            # Give it a different title
            $book->title = 'The Really Great Gatsby';

            # Save the changes
            $book->save();

            echo "Update complete; check the database to see if your update worked...";
        }
        else {
            echo "Book not found, can't update.";
        }
    }


    /**
	* Get all the books via the Book model
	*/
    public function example11() {

        $books = Book::all();

        # Make sure we have results before trying to print them...
        if(!$books->isEmpty()) {

            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'No books found';
        }
    }


    /**
    * Create a new book via the Book model
    */
    public function example10() {

        # Instantiate a new Book Model object
        $book = new Book();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $book->title = 'Harry Potter';
        $book->author = 'J.K. Rowling';
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

        # Invoke the Eloquent save() method
        # This will generate a new row in the `books` table, with the above data
        $book->save();

        echo 'Added: '.$book->title;
    }


    /**
    * Update a book using the Query builder.
    *
    */
    public function example9() {

        # This was how I wrote it in lecture and it wasn't working:
        //$book = DB::table('books')->find(2)->update(['title' => 'foobar']);

        # This does work:
        $book = DB::table('books')->where('id','=','2')->update(['title' => 'foobar']);

        # Upon closer inspection, it appears that update has to work on a "Builder" instance
        # The following two dumps demonstrate the difference
        dump(DB::table('books')->find(2)); # Gets a Object with the book data
        dump(DB::table('books')->where('id','=','2')); # Gets a Builder instance

    }


    /**
    * Create a book using QueryBuilder
    */
    public function example8() {
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'published' => 1925,
            'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
            'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
        ]);

        echo 'Added a new book';
    }


    /**
    * Get all the books using QueryBuilder
    */
    public function example7() {

        # Use the QueryBuilder to get all the books
        $books = DB::table('books')->get();

        # Output the results
        foreach ($books as $book) {
            echo $book->title;
        }

    }


    /**
    * Debugging curl extension for students;
    * ref: https://piazza.com/class/iqiwxxw3sex3r2?cid=143
    */
    public function example6() {
        return \Magyarjeti\LaravelLipsum\LipsumFacade::html();
    }


    /**
    *
    */
    public function example5() {

        $quote = new Quote();
        return $quote->getRandomQuote();

    }


    /**
    *
    */
    public function example4() {

        $random = new Random();
        return $random->getRandomString(8);

    }


    /**
    *
    */
    public function example3() {

        echo \App::environment();
        echo 'App debug: '.config('app.debug');

    }


    /**
    * Demonstrates useful data output methods like dump, and dd
    */
    public function example2() {
        $fruits = ['apples','oranges','pears'];
        dump($fruits);
        var_dump($fruits);
        dd($fruits);
    }


    /**
    *
    */
    public function example1() {
        return 'This is example 1';
    }


    /**
    * Display an index of all available index methods
    */
    public function index() {

        # Get all the methods in this class
        $actionsMethods = get_class_methods($this);

        # Loop through all the methods
        foreach($actionsMethods as $actionMethod) {

            # Only if the method includes the word "example"...
            if(strstr($actionMethod, 'example')) {

                # Display a link to that method's route
                echo '<a target="_blank" href="/practice/'.str_replace('example','',$actionMethod).'">'.$actionMethod.'</a><br>';
            }
        }
    }

}
