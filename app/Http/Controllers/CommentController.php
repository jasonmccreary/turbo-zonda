<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\NewComment;
use App\Http\Requests\CommentStoreRequest;
use App\Mail\CommentCreated;
use Illuminate\Http\Request;
use Mail;

class CommentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('comment.create');
    }

    /**
     * @param \App\Http\Requests\CommentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['content' => 'required|string']);

        $comment = Comment::create($request->all());

        event(new NewComment($comment));

        Mail::to(env('REVIEWER_EMAIL'))->send(new CommentCreated($comment));

        $request->session()->flash('message', $message);

        return redirect(route('comment.create'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function responses(Request $request)
    {
        // collpase
        return response(null, 204);
        return response(null, '204');

        // preserve status
        return response(null, 200);
        return response(null, '200');
    }
}
