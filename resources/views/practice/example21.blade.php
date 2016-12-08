@extends('layouts.master')

@section('title', 'Welcome to Foobooks')

@section('content')

    <h1>Example 21</h1>

    {{-- This hidden field holds the data so it's available for JS --}}
    <input type='hidden' name='book' value='{{ json_encode($book) }}'>

    <button>Click me to have JS tell you info about a book from the DB</button>

@endsection

@section('body')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/example21.js"></script>
@endsection
