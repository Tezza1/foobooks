@extends('layouts.master')

@section('title')
    {{ $book->title }}
@endsection

@section('head')
    <link href='/css/book.css' rel='stylesheet'>
@endsection

@section('content')

    <h1 class='truncate'>{{ $book->title }}</h1>

    <h2 class='truncate'>{{ $book->author->first_name }} {{ $book->author->last_name }}</h2>

    <img class='cover' src='{{ $book->cover }}' alt='Cover for {{$book->title}}'>

    <div class='tags'>
        @foreach($book->tags as $tag)
            <div class='tag'>{{ $tag->name }}</div>
        @endforeach
    </div>

    <a class='button' href='/books/{{ $book->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
    <a class='button' href='/books/{{ $book->id }}/delete'><i class='fa fa-trash'></i> Delete</a>

    <br><br>
    <a class='return' href='/books'>&larr; Return to all books</a>

@endsection
