@extends('layouts.master')

@section('title', 'Add a new book')

@section('content')
    <h1>Add a new book</h1>
    <form method='POST' action='/books'>

        {{ csrf_field() }}

        Title: <input type='text' name='title' value='{{ old("title") }}'>

        <input type='submit' value='Add new book'>

        @if(count($errors) > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>
@endsection
