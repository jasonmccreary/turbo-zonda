@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('comment.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <textarea name="content" rows="6"></textarea>


        <button type="submit">Leave comment</button>
    </form>


    @if (Auth::check())
        <button type="submit">Upvote</button>
    @endif
@endsection
