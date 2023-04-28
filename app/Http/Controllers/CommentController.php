<?php

namespace App\Http\Controllers;
use App\Events\UserRegistration;
use App\Models\Comment;
use Pusher\Pusher;
use App\Models\Message;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id , StoreCommentRequest  $request)
    {

        $logged_in_user = Auth::user()->id;
        $comment = new Comment();
        $comment->order_id =$id;
        $comment->user_id =$logged_in_user;
        $comment->comment =$request->comment;
        event(new UserRegistration($comment->comment));
        $comment->save();
        $message = new Message;
        $message->from = Auth::user()->id;
        $id = $message->from;
        $message->message = $comment->comment;
        $message->save();

        $options = array(
         'cluster' =>'ap1',
         'useTLS' => true
        );

        $pusher = new Pusher(
         env('PUSHER_APP_KEY'),
         env('PUSHER_APP_SECRET'),
         env('PUSHER_APP_ID'),
         $options,

        );

        $data = ['from'=>$id];
        $pusher->trigger('Atlobs-channel','user-register',$data);
        // dd($request->comment);


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
