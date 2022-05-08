<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys =  BlogCategory::where('status', 1)->get();
        $tags =  Tag::where('status', 1)->get();
        return view ('admin.blog-module.blog', compact ('categorys', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'tag_id'=>'required',
            'arthur'=>'required',
            'blog_image'=>'required|image',
            'title'=>'required',
            'description'=>'required',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $image_path = addFile ($request->blog_image, 'blog_image/');

        if($image_path['type'] == 'image'){
            $input = $request->except(['_token']);
            $blog = Blog::create([
                'category_id' => $request->category_id,
                'tag_id' => json_encode ($request->tag_id),
                'arthur' => $request->arthur,
                'blog_image' => $image_path['file_path'],
                'title' => $request->title,
                'description' => $request->description,
            ]);
            if ($blog){
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

        $blog = Blog::with ('category')->where('id', $request->id)->first();

        $data = array(
            'blog' => $blog,
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
            $data = Blog::with ('category')->latest()->get();
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
                'category_id' => 'required',
                'tag_id'=>'required',
                'arthur'=>'required',
                'title'=>'required',
                'description'=>'required',
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
            if (isset($request->blog_image)){
                $validator = Validator::make($request->all(), [
                    'blog_image'=>'required|image',
                ]);
                if ($validator->fails()) {
                    return sendError($validator->messages()->first(), null);
                }
                $image_path = addFile ($request->blog_image, 'blog_image/');
            }

            $blog = Blog::find($request->id);
            $data = $blog->update([
                'category_id' => $request->category_id,
                'tag_id' => json_encode ($request->tag_id),
                'arthur' => $request->arthur,
                'blog_image' => isset($request->blog_image) && $image_path['file_path'] ?? $blog->blog_image,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            if($data){
                return sendSuccess('Blog updated successfully...!!!', null);
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

        $blog = Blog::find($request->id);

        if(!$blog){
            return sendError ('Unable to find blog...!!!', null);
        }

        if ($blog->delete()){
            return sendSuccess ('Blog deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
