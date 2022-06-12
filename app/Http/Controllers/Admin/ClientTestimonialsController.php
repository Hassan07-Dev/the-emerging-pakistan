<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientTestimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ClientTestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.client-testimonial');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_name' => 'required',
            'designation'=>'required',
            'client_image'=>'required|image',
            'short_comment'=>'required',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $image_path = addFile ($request->client_image, 'client_image/');

        if($image_path['type'] == 'image'){
            $input = $request->except(['_token']);
            $clientTestimonials = ClientTestimonials::create([
                'client_name' => $request->client_name,
                'designation' => $request->designation,
                'client_image' => $image_path['file_path'],
                'short_comment' => $request->short_comment,
            ]);
            if ($clientTestimonials){
                return sendSuccess ('Created successfully...!!!', null);
            }
            return sendError ('Something went wrong...!!!', null);
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

        $clientTestimonials = ClientTestimonials::where('id', $request->id)->first();

        $data = array(
            'clientTestimonials' => $clientTestimonials,
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
            $data = ClientTestimonials::latest()->get();
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
                'client_name' => 'required',
                'designation'=>'required',
                'short_comment'=>'required',
                'status'=>'required',
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
            $clientTestimonials= ClientTestimonials::find($request->id);

            if (!$clientTestimonials){
                return sendError ('No such Client Testimonials found...!!!', null);
            }

            $data = [];

            if (isset($request->client_image)){
                $validator = Validator::make($request->all(), [
                    'client_image'=>'required|image',
                ]);
                if ($validator->fails()) {
                    return sendError($validator->messages()->first(), null);
                }

                $image_path = addFile ($request->client_image, 'client_image/');
                if ($image_path['file_path']){
                    if (File::exists(public_path($clientTestimonials->client_image))) {
                        unlink(public_path($clientTestimonials->client_image));
                    }
                    $data['client_image'] = $image_path['file_path'];
                }
            }

            $data['client_name'] = $request->client_name;
            $data['designation'] = $request->designation;
            $data['short_comment'] = $request->short_comment;
            $data['status'] = $request->status;

            if($clientTestimonials->update($data)){
                return sendSuccess('Client Testimonials updated successfully...!!!', null);
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

        $clientTestimonials = ClientTestimonials::find($request->id);

        if(!$clientTestimonials){
            return sendError ('Unable to find Client Testimonials...!!!', null);
        }

        if ($clientTestimonials->delete()){
            return sendSuccess ('Client Testimonials deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
