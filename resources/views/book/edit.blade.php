@extends('layouts.master')

@section('title')
    Edit {{ $book->title }}
@stop

@section('content')

    <h1>Edit {{ $book->title }} </h1>

    <form method='POST' action='/books/{{ $book->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$book->id}}' type='hidden'>

        <div class='form-group'>
            <label>Title:</label>
            <input
            type='text'
            id='title'
            name='title'
            value='{{ old('title', $book->title) }}'
            >
            <div class='error'>{{ $errors->first('title') }}</div>
        </div>


        <div class='form-group'>
            <label>Published Year (YYYY):</label>
            <input
            type='text'
            id='published'
            name='published'
            value='{{ old('published' , $book->published) }}'
            >
            <div class='error'>{{ $errors->first('published') }}</div>
        </div>

        <div class='form-group'>
            <label>URL of cover image:</label>
            <input
            type='text'
            id='cover'
            name='cover'
            value='{{ old('cover', $book->cover) }}'
            >
            <div class='error'>{{ $errors->first('cover') }}</div>
        </div>

        <div class='form-group'>
            <label>URL to purchase this book:</label>
            <input
            type='text'
            id='purchase_link'
            name='purchase_link'
            value='{{ old('purchase_link', $book->purchase_link) }}'
            >
            <div class='error'>{{ $errors->first('purchase_link') }}</div>
        </div>


        <div class='form-group'>
            <label>Author</label>
            <select name='author_id'>
                @foreach($authors_for_dropdown as $author_id => $author)
                    <option
                    {{ ($author_id == $book->author->id) ? 'SELECTED' : '' }}
                    value='{{ $author_id }}'
                    >{{ $author }}</option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label>Tags</label>
            @foreach($tags_for_checkboxes as $tag_id => $tag_name)
                <input
                type='checkbox'
                value='{{ $tag_id }}'
                name='tags[]'
                {{ (in_array($tag_name, $tags_for_this_book)) ? 'CHECKED' : '' }}
                >
                {{ $tag_name }} <br>
            @endforeach
        </div>


        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Save changes</button>


        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>


@stop
