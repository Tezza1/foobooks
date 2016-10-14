<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Rych\Random\Random;

use App\Utilities\Quote;

class PracticeController extends Controller
{

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
                echo '<a target="_blank" href="/practice/'.str_replace('example','',$actionMethod).'">'.$actionMethod.'</a>';
            }
        }
    }

}
