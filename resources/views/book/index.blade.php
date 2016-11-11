@extends('layouts.master')

@section('title')
    View all Books
@stop

@section('content')
    
    @foreach($books as $book)
        <h2>{{ $book->title }}</h2>
        <img src='{{ $book->cover }}'>
    @endforeach
@stop
