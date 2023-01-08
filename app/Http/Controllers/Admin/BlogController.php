<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Mail\BlogStatusMail;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
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

    public function userIndex()
    {
        $categorys =  BlogCategory::where('status', 1)->get();
        $tags =  Tag::where('status', 1)->get();
        return view ('admin.blog-module.users-blogs', compact ('categorys', 'tags'));
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
            'blog_image'=>'required|image',
            'title'=>'required',
            'excerpt'=>'required',
            'description'=>'required',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        if(!isset(Auth::guard ('web')->user ()->id)){
            $validator = Validator::make($request->all(), [
                'arthur'=>'required',
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
        }

        $image_path = addFile ($request->blog_image, 'blog_image/');
        if($image_path['type'] == 'image'){
            $input = $request->except(['_token']);
            $blog = Blog::create([
                'category_id' => $request->category_id,
                'user_id' => isset(Auth::guard ('web')->user ()->id)?Auth::gaurd('web')->user ()->id:null,
                'arthur' => isset(Auth::guard ('web')->user ()->id)?null:$request->arthur,
                'blog_image' => $image_path['file_path'],
                'title' => $request->title,
                'description' => $request->description,
                'excerpt' => $request->excerpt,
                'status'=> isset(Auth::guard ('web')->user ()->id)?'0':'1'
            ]);

            if ($blog){
                $insert_data = array ();
                $tags_data =$request->tag_id;
                foreach ($tags_data as $hashtag) {
                    $hashtag_exists = Tag::where ('tag_name', $hashtag)->first ();
                    if ($hashtag_exists) {
                        $insert_data[] = array (
                            'blog_id' => $blog->id,
                            'tag_id' => $hashtag_exists->id,
                            'created_at' => Carbon::now (),
                            'updated_at' => Carbon::now (),
                        );
                    } else {
                        $new_tag = new Tag();
                        $new_tag->tag_name = $hashtag;
                        $new_tag->save ();
                        $insert_data[] = array (
                            'blog_id' => $blog->id,
                            'tag_id' => $new_tag->id,
                            'created_at' => Carbon::now (),
                            'updated_at' => Carbon::now (),
                        );
                    }
                }
                $blogtags = new BlogTag();
                if($blogtags->insert ($insert_data)){
                    return sendSuccess ('Created successfully...!!!', null);
                }
                return sendError ('Tags are not saved...!!!', null);
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

        $blog = Blog::with ('category', 'getTags')->where('id', $request->id)->first();

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
            $data = Blog::with ('category', 'getTags')->whereNull ('user_id')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn = '<a id="edit_data" class="btn btn-primary btn-sm editProduct" data-original-title="Edit" data-id="'.$row->id.'"><i class="fas fa-pen text-white"></i></a>';
                    $btn = $btn.'<a id="delete_data" class="btn btn-danger btn-sm deleteProduct" data-original-title="Delete" data-id="'.$row->id.'"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';
                    $btn = $btn.'<a id="meta_data" class="btn btn-info btn-sm" data-original-title="Tag Data" data-id="'.$row->id.'">SEO</a>';

                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
    }

    public function editUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::with ('getUser','category', 'getTags')->whereNotNull ('user_id')->latest()->orderBy ('status', 'ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    if($row->status == 0){
                        $btn = '<a class="btn btn-primary btn-sm editProduct change_status_data" data-original-title="Edit" data-val="1" data-id="'.$row->id.'">Approve</a>';
                    } else{
                        $btn = '<a class="btn btn-primary btn-sm editProduct change_status_data" data-original-title="Edit" data-val="0" data-id="'.$row->id.'">Disable</a>';
                    }
                    $btn = $btn.'<a id="delete_data" class="btn btn-danger btn-sm deleteProduct ml-1" data-original-title="Delete" data-id="'.$row->id.'"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';
                    $btn = $btn.'<a id="meta_data" class="btn btn-info btn-sm" data-original-title="Tag Data" data-id="'.$row->id.'">SEO</a>';

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
                'excerpt'=>'required',
                'status'=>'required',

            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
            $blog = Blog::find($request->id);

            if (!$blog){
                return sendError ('No such blog found...!!!', null);
            }

            $data = [];

            if (isset($request->blog_image)){
                $validator = Validator::make($request->all(), [
                    'blog_image'=>'required|image',
                ]);
                if ($validator->fails()) {
                    return sendError($validator->messages()->first(), null);
                }

                $image_path = addFile ($request->blog_image, 'blog_image/');
                if ($image_path['file_path']){
                    if($blog->blog_image != null){
                        if (File::exists(public_path($blog->blog_image))) {
                            unlink(public_path($blog->blog_image));
                        }
                    }
                    $data['blog_image'] = $image_path['file_path'];
                }
            }

            $data['category_id'] = $request->category_id;
            $data['arthur'] = $request->arthur;
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['excerpt'] = $request->excerpt;
            $data['status'] = $request->status;

            if($blog->update($data)){
                $insert_data = array ();
                $tags_data =$request->tag_id;
                foreach ($tags_data as $hashtag) {
                    $hashtag_exists = Tag::where ('tag_name', $hashtag)->first ();
                    if ($hashtag_exists) {
                        array_push ($insert_data, $hashtag_exists->id);
                    } else {
                        $new_tag = new Tag();
                        $new_tag->tag_name = $hashtag;
                        $new_tag->save ();
                        array_push ($insert_data, $new_tag->id);
                    }
                }
                $blog->getTags()->sync($insert_data);
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

    public function statusChange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'	=> 'required',
            'val'	=> 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $blog = Blog::find($request->id);

        if(!$blog){
            return sendError ('Unable to find blog.', null);
        }

        if ($blog->update(['status'=>$request->val])){
            $text = $request->val == '1'? 'approve':'disable';
            $viewData['full_name'] = Auth::user()->first_name."".Auth::user()->last_name;
            $viewData['text'] = "Your Blog is ".$text." by the Emerging Pakistan Admin...!!!";
            Mail::to(Auth::user()->email)->send(new BlogStatusMail($viewData));
            return sendSuccess ('Blog '.$text.' successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }

    public function updateMeta(Request $request){
        $validator = Validator::make($request->all(), [
            'id'	=> 'required',
            'meta_title'	=> 'required|max:255',
            'meta_description'	=> 'required|max:255',
            'meta_keywords'	=> 'required',
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $blog = Blog::find($request->id);

        if(!$blog){
            return sendError ('Unable to find blog.', null);
        }

        $updateMeta = $blog->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        if($updateMeta){
            return sendSuccess ('Data Updated Successfully', null);
        }
        return sendError ('Something went wrong...!!!', null);
    }
}
