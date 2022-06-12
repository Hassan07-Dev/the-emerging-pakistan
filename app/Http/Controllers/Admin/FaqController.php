<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.faq');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faq_question' => 'required',
            'faq_answer'=>'required',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $input = $request->except(['_token']);
        $faq = Faq::create([
            'faq_question' => $request->faq_question,
            'faq_answer' => $request->faq_answer
        ]);
        if ($faq){
            return sendSuccess ('Created successfully...!!!', null);
        }
        return sendError ('Something went wrong...!!!', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
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

        $faq = Faq::where('id', $request->id)->first();

        $data = array(
            'faq' => $faq,
        );

        if(!$data){
            return sendError ('Something went wrong...!!!', null);
        }
        return sendSuccess('Data Found!', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a id="edit_data" class="btn btn-primary btn-sm editProduct" data-original-title="Edit" data-id="'.$row->id.'"><i class="fas fa-pen text-white"></i></a>';
                    $btn = $btn.'<a id="delete_data" class="btn btn-danger btn-sm deleteProduct" data-original-title="Delete" data-id="'.$row->id.'"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'faq_question' => 'required',
                'faq_answer'=>'required',
                'status'=>'required',
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
            $faq = Faq::find($request->id);

            if (!$faq){
                return sendError ('No such faq found...!!!', null);
            }

            $data = [];
            $data['faq_question'] = $request->faq_question;
            $data['faq_answer'] = $request->faq_answer;
            $data['status'] = $request->status;

            if($faq->update($data)){
                return sendSuccess('Faq updated successfully...!!!', null);
            }
            return sendError ('Something went wrong...!!!', null);
        } catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
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

        $faq = Faq::find($request->id);

        if(!$faq){
            return sendError ('Unable to find faq...!!!', null);
        }

        if ($faq->delete()){
            return sendSuccess ('Faq deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
