@extends('layouts.master')

@section('head')
    <link href='/css/book.css' rel='stylesheet'>
@endsection

@section('title')
    View all Books
@endsection

@section('content')

    <h1>All the books</h1>

    @if(sizeof($books) == 0)
        You have not added any books, you can <a href='/books/create'>add a book now to get started</a>.
    @else
        <div id='books' class='cf'>
            @foreach($books as $book)

                <section class='book'>
                    <a href='/books/{{ $book->id }}'><h2 class='truncate'>{{ $book->title }}</h2></a>

                    <h3 class='truncate'>{{ $book->author->first_name }} {{ $book->author->last_name }}</h3>

                    <a href='/books/{{ $book->id }}'><img class='cover' src='{{ $book->cover }}' alt='Cover for {{ $book->title }}'></a>

                    <div class='tags'>
                        @foreach($book->tags as $tag)
                            <div class='tag'>{{ $tag->name }}</div>
                        @endforeach
                    </div>

                    <a class='button' href='/books/{{ $book->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
                    <a class='button' href='/books/{{ $book->id }}'><i class='fa fa-eye'></i> View</a>
                    <a class='button' href='/books/{{ $book->id }}/delete'><i class='fa fa-trash'></i> Delete</a>
                </section>
            @endforeach
        </div>
    @endif

@endsection
