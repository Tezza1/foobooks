@extends('layouts.master')


@section('title')
    Success!
@stop


@section('content')
    Success! The book {{ $title }} was added.

    <a href='/books/create'>Add another one...</a>
@stop
