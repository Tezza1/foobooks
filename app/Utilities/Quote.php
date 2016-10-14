<?php

namespace App\Utilities;

class Quote {

    public $quotes = [
        'The secret of life is to appreciate the pleasure of being terribly, terribly deceived. -Oscar Wilde',
        'The real art of conversation is not only to say the right thing at the right place but to leave unsaid the wrong thing at the tempting moment. -Dorothy Nevill',
        'You have to have confidence in your ability, and then be tough enough to follow through. -Rosalynn Carter',
        'The best way to become acquainted with a subject is to write a book about it. -Benjamin Disraeli ',
        'Regret for wasted time is more wasted time. -Mason Cooley',
    ];

    /**
    *
    */
    public function getQuote($num) {
        return $this->quotes[$num];
    }


    /**
	*
	*/
    public function getQuoteCount() {

        return \sizeof($this->quotes) - 1;
    }


    /**
	*
	*/
    public function getRandomQuote() {

        $randomNum = rand(0, $this->getQuoteCount());

        return $this->getQuote($randomNum);
    }


}
