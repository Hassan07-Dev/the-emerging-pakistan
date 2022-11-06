<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index($category = null){
        $latest_blogs = Blog::with('category')
            ->whereHas('category', function($q) use ($category){
                $q->when($category, function ($q) use ($category){
                    $q->where('category_name', ucwords(strtolower(str_replace('-', ' ', $category))));
                });
            })
            ->where('status', 1)
            ->latest()
            ->paginate(12);
        return view ('blog', compact('latest_blogs'));
    }

    public function categoryList(){
        $categories = BlogCategory::withCount('blog')->orderBy('blog_count', 'desc')->where('status', 1)->get();
        return view ('categories', compact('categories'));
    }

    public function blogDetails($slug){
        $blog_details = Blog::with ('getUser', 'category', 'getTags')->where('slug', $slug)->first();
        return view ('blog-details', compact ('blog_details'));
    }

    public function blogList(Request $request){
        try {
            if($request->page_no == 1){
                $number_recent = 0;
            }else if($request->page_no > 1){
                $decrement = $request->page_no - 1;
                $number_recent = $decrement * 6;
            }else{
                $number_recent = 0;
            }
            $inner_number_recent = round(($number_recent/2),0,PHP_ROUND_HALF_DOWN);
            $inner_take = round((6/2),0,PHP_ROUND_HALF_DOWN);

//            dd ($inner_number_recent.'---'.$inner_take);

            $blogs = Blog::where('status', 1) ->skip($inner_number_recent)->take($inner_take)->get();
            if($blogs){
                return sendSuccess ('Data found!', $blogs);
            }
            return sendError ('No blog found!', null);
        } catch (\Exception $e){
            return sendError ('Something went wrong!', $e);
        }
    }

    public function writeBlog($id = null)
    {
        $blog = '';
        if($id != null){
            $blog = Blog::with('getTags', 'category')->where("id", $id)->first();
        }
        $categorys =  BlogCategory::where('status', 1)->get();
        $tags =  Tag::where('status', 1)->get();
        return view ('write-for-us', compact ('categorys', 'tags', 'blog'));
    }

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
                'user_id' => Auth::user ()->id,
                'arthur' => Auth::user ()->first_name.' '.Auth::user ()->last_name,
                'blog_image' => $image_path['file_path'],
                'title' => $request->title,
                'description' => $request->description,
                'excerpt' => $request->excerpt,
                'status'=> '0'
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
                    return sendSuccess ('Blog is send for review...!!!', null);
                }
                return sendError ('Tags are not saved...!!!', null);
            }
            return sendError ('Something went wrong...!!!', null);
        }
        return sendError ('Something went wrong...!!!', null);
    }

    public function blogDelete(Request $request, $id)
    {
        if(!$id){
            return redirect()->back()->with('error', 'Id is required...!!!') ;
        }

        $blog = Blog::whereNotNull('user_id')->where('user_id', Auth::user()->id)->where('id', $id)->first();

        if(!$blog){
            return redirect()->back()->with('error', 'Unable to find blog...!!!') ;
        }

        if ($blog->delete()){
            return redirect()->back()->with('success' , 'Blog deleted successfully...!!!') ;
        }else {
            return redirect()->back()->with('error', 'Something went wrong...!!!') ;
        }
    }

    public function blogEdit(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'category_id' => 'required',
                'tag_id'=>'required',
                'title'=>'required',
                'description'=>'required',
                'excerpt'=>'required',
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
            $data['arthur'] = Auth::user ()->first_name.' '.Auth::user ()->last_name;
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['excerpt'] = $request->excerpt;

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

}

