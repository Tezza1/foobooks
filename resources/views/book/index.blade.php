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
        You have not added any books, you can <a href='/book/create'>add a book now to get started</a>.
    @else
        <div id='books' class='cf'>
            @foreach($books as $book)

                <section class='book'>
                    <a href='/books/{{ $book->id }}'><h2 class='truncate'>{{ $book->title }}</h2></a>

                    <img class='cover' src='{{ $book->cover }}' alt='Cover for {{ $book->title }}'>

                    <br>
                    <a href='/books/{{ $book->id }}/edit'><i class='fa fa-pencil'></i> Edit</a><br>
                    <a href='/books/{{ $book->id }}'><i class='fa fa-eye'></i> View</a><br>
                </section>
            @endforeach
        </div>
    @endif

@endsection
