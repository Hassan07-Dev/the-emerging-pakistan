<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrendingNewsRequest;
use App\Http\Requests\UpdateTrendingNewsRequest;
use App\Models\BlogCategory;
use App\Models\TrendingNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DataTables;


class TrendingNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.trending-news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_text' => 'required|string',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $input = $request->except(['_token']);

        if (isset($request->news_image) && $request->news_image != ''){
            $validator = Validator::make($request->all(), [
                'news_image'=>'required|image'
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }

            $image_path = addFile ($request->news_image, 'upload/trending-news/');

            if($image_path['type'] == 'image'){
                $input['news_image'] = $image_path['file_path'];
            }
        }

        $input['news_text'] = $request->news_text;

        $trending_news = TrendingNews::create($input);
        if ($trending_news){
            return sendSuccess ('Created successfully...!!!', null);
        }
        return sendError ('Something went wrong...!!!', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrendingNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrendingNewsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrendingNews  $trendingNews
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

        $trending_news = TrendingNews::find($request->id);

        $data = array(
            'news' => $trending_news,
        );

        if(!$data){
            return sendError ('Something went wrong...!!!', null);
        }
        return sendSuccess('Data Found!', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrendingNews  $trendingNews
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $data = TrendingNews::latest()->get();
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
     * @param  \App\Http\Requests\UpdateTrendingNewsRequest  $request
     * @param  \App\Models\TrendingNews  $trendingNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'news_text' => 'required|string'
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }


        try{
            $trending_news = TrendingNews::find($request->id);

            if (isset($request->news_image)){
                $validator = Validator::make($request->all(), [
                    'news_image'=>'required|image',
                ]);
                if ($validator->fails()) {
                    return sendError($validator->messages()->first(), null);
                }

                $image_path = addFile ($request->news_image, 'upload/trending-news/');
                if ($image_path['file_path']){
                    if($trending_news->news_image != null){
                        if (File::exists(public_path($trending_news->news_image))) {
                            unlink(public_path($trending_news->news_image));
                        }
                    }
                    $data['news_image'] = $image_path['file_path'];
                }
            }


            $data['news_text'] = $request->news_text;
            $data['status'] = $request->status;

            if($trending_news->update($data)){
                return sendSuccess('Trending News updated successfully...!!!', null);
            }
            return sendError ('Something went wrong...!!!', null);
        } catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrendingNews  $trendingNews
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

        $catgeory = TrendingNews::find($request->id);

        if(!$catgeory){
            return sendError ('Unable to find user.', null);
        }

        if ($catgeory->delete()){
            return sendSuccess ('Trending News deleted successfully...!!!', null);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }
}
