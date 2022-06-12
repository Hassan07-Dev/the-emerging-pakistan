<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.services');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_name' => 'required',
            'service_logo'=>'required',
            'service_image'=>'required|image',
            'description'=>'required',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $image_path = addFile ($request->service_image, 'service_image/');

        if($image_path['type'] == 'image'){
            $input = $request->except(['_token']);
            $service = Services::create([
                'service_name' => $request->service_name,
                'service_logo' => $request->service_logo,
                'service_image' => $image_path['file_path'],
                'description' => $request->description,
            ]);
            if ($service){
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

        $services = Services::where('id', $request->id)->first();

        $data = array(
            'services' => $services,
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
            $data = Services::latest()->get();
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
                'service_name' => 'required',
                'service_logo' => 'required',
                'description'=>'required',
                'status'=>'required',
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
            $service = Services::find($request->id);

            if (!$service){
                return sendError ('No such service found...!!!', null);
            }

            $data = [];

            if (isset($request->service_image)){
                $validator = Validator::make($request->all(), [
                    'service_image'=>'required|image',
                ]);
                if ($validator->fails()) {
                    return sendError($validator->messages()->first(), null);
                }

                $image_path = addFile ($request->service_image, 'service_image/');
                if ($image_path['file_path']){
                    if (File::exists(public_path($service->service_image))) {
                        unlink(public_path($service->service_image));
                    }
                    $data['service_image'] = $image_path['file_path'];
                }
            }

            $data['service_logo'] = $request->service_logo;
            $data['service_name'] = $request->service_name;
            $data['description'] = $request->description;
            $data['status'] = $request->status;

            if($service->update($data)){
                return sendSuccess('Service updated successfully...!!!', null);
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

        $service = Services::find($request->id);

        if(!$service){
            return sendError ('Unable to find service...!!!', null);
        }

        if ($service->delete()){
            return sendSuccess ('Service deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
