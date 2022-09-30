<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.users.users-list');
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
            'id'	=> 'required'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $user = User::where('id', $request->id)->first()->makeHidden(['email_verified_at', 'status', 'created_at', 'updated_at']);

        $data = array(
            'user' => $user,
        );

        if(!$data){
            return sendError ('Something went wrong...!!!', null);
        }
        return sendSuccess('Data Found!', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row) {
                    if ($row->status == 1){
                        $btn = '<a id="block_data" class="btn btn-danger btn-sm deleteProduct" data-toggle="tooltip" data-placement="right" title="Block" data-original-title="Block" data-val="0" data-id="' . $row->id . '"><i class="fa-solid fa-ban"></i></a>';
                    } else {
                        $btn = '<a id="block_data" class="btn btn-info btn-sm deleteProduct" data-toggle="tooltip" data-placement="right" title="Un-Block" data-original-title="Block" data-val="1" data-id="' . $row->id . '"><i class="fa-solid fa-ban"></i></a>';
                    }
                    $btn = $btn.'<a id="delete_data" class="btn btn-warning btn-sm deleteProduct ml-1" data-toggle="tooltip" data-placement="left" title="Delete" data-original-title="Delete" data-id="'.$row->id.'"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
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
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'	=> 'required'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $catgeory = User::find($request->id);

        if(!$catgeory){
            return sendError ('Unable to find user.', null);
        }

        if ($catgeory->delete()){
            return sendSuccess ('User deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }

    public function block(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'	=> 'required',
            'val'	=> 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $catgeory = User::find($request->id);

        if(!$catgeory){
            return sendError ('Unable to find user.', null);
        }

        if ($catgeory->update(['status'=>$request->val])){
            $text = $request->val == '1'? 'un-blocked':'blocked';
            return sendSuccess ('User '.$text.' successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
