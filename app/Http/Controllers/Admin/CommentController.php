<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.comments');
    }

    public function commentsList(Request $request)
    {
        if ($request->ajax()) {
            $data = Comment::with ('getBlog', 'getUser','commentReplies.getUser')->latest()->orderBy ('approval', 'ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '';
                    if($row->approval == 0){
                        $btn = '<a class="btn btn-primary btn-sm editProduct change_status_data" data-original-title="Edit" data-val="1" data-id="'.$row->id.'">Approve</a>';
                    }
                    $btn = $btn.'<a id="delete_data" class="btn btn-danger btn-sm deleteProduct ml-1" data-original-title="Delete" data-id="'.$row->id.'"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
    }

    public function statusChange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'	=> 'required',
            'val'	=> 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $comment = Comment::with ('commentReplies')->where('id', $request->id)->first();

        if($comment->comment_id != null){
            $check = Comment::find($comment->comment_id);
            if($check->approval == 0){
                return sendError ('Unable to approve child comment, before parent comment.', null);
            }
        }


        if(!$comment){
            return sendError ('Unable to find comment.', null);
        }

        if ($comment->update(['approval'=>$request->val])){
            $text = $request->val == '1'? 'approve':'disable';
            return sendSuccess ('Comment '.$text.' successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'	=> 'required'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $blog = Comment::find($request->id);

        if(!$blog){
            return sendError ('Unable to find commet...!!!', null);
        }

        if ($blog->delete()){
            return sendSuccess ('Comment deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
