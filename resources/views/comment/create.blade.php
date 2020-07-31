@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('comment.store') }}">
        @csrf

        <textarea name="content" rows="6"></textarea>


        <button type="submit">Leave comment</button>
    </form>


    @auth
        <button type="submit">Upvote</button>
    @endauth
@endsection
