<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\File;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.blog-module.category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string',
            'category_image'=>'required|image'
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $image_path = addFile ($request->category_image, 'upload/category_image/');

        if($image_path['type'] == 'image'){
            $input = $request->except(['_token']);
            $input['category_name'] = $request->category_name;
            $input['category_image'] = $image_path['file_path'];
            $tag = BlogCategory::create($input);
            if ($tag){
                return sendSuccess ('Created successfully...!!!', null);
            }
            return sendError ('Something went wrong...!!!', null);
        }
        return sendError ('Something went wrong...!!!', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
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

        $category = BlogCategory::find($request->id);

        $data = array(
            'category' => $category,
        );

        if(!$data){
            return sendError ('Something went wrong...!!!', null);
        }
        return sendSuccess('Data Found!', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $data = BlogCategory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a id="edit_data" class="btn btn-primary btn-sm editProduct" data-original-title="Edit" data-id="'.$row->id.'"><i class="fas fa-pen text-white"></i></a>';
                    $btn = $btn.'<a id="delete_data" class="btn btn-danger btn-sm deleteProduct" data-original-title="Delete" data-id="'.$row->id.'"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('productajax');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogCategoryRequest  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'category_name' => 'required|string'
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        
        try{
            $tag = BlogCategory::find($request->id);

            if (isset($request->category_image)){
                $validator = Validator::make($request->all(), [
                    'category_image'=>'required|image',
                ]);
                if ($validator->fails()) {
                    return sendError($validator->messages()->first(), null);
                }
    
                $image_path = addFile ($request->category_image, 'upload/category_image/');
                if ($image_path['file_path']){
                    if($tag->category_image != null){
                        if (File::exists(public_path($tag->category_image))) {
                            unlink(public_path($tag->category_image));
                        }
                    }
                    $data['category_image'] = $image_path['file_path'];
                }
            }
    

            $data['category_name'] = $request->category_name;
            $data['status'] = $request->status;

            if($tag->update($data)){
                return sendSuccess('Category updated successfully...!!!', null);
            }
            return sendError ('Something went wrong...!!!', null);
        } catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
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

        $catgeory = BlogCategory::find($request->id);

        if(!$catgeory){
            return sendError ('Unable to find user.', null);
        }

        if ($catgeory->delete()){
            return sendSuccess ('Category deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
