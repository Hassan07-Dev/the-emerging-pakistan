<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_id' => 'required|exists:blogs,id',
            'comment'=>'required',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        if(isset($request->comment_id) && !empty($request->comment_id)){
            $validator = Validator::make($request->all(), [
                'comment_id'=>'required|exists:comments,id',
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
        }

        $comments =  new Comment();
        $comments->blog_id = $request->blog_id;
        $comments->user_id = Auth::user()->id;
        $comments->comment_text = $request->comment;
        if(isset($request->comment_id) && !empty($request->comment_id)) {
            $comments->comment_id = $request->comment_id;
        }

        if($comments->save ()){
            return sendSuccess ('Comment added...!!!', null);
        }
        return sendError ('Something went wrong...!!!', null);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_id' => 'required|exists:blogs,id',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $comments =  Comment::with ('getUser', 'commentReplies.getUser')
                        ->whereNull ('comment_id')
                        ->where('blog_id', $request->blog_id)
                        ->where('status', 1)
                        ->where('approval', 1)
                        ->get();

        if($comments){
            return sendSuccess ('Comment found...!!!', $comments);
        }
        return sendError ('Something went wrong...!!!', null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
