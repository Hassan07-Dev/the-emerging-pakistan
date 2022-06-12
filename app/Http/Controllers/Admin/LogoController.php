<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\UpdateLogoRequest;
use App\Models\Blog;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Logo::where('id', 1)->first();
        return view ('admin.logo.logo', compact ('data'));
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
     * @param  \App\Http\Requests\StoreLogoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLogoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogoRequest  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'logo_image' => 'required',
            ]);
            if ($validator->fails()) {
                return sendError($validator->messages()->first(), null);
            }
            $request->except(['_token']);
            $request->merge(["id"=>"1"]);
            $logo = Logo::find($request->id);

            $data = [];

            $image_path = addFile ($request->logo_image, 'blog_image/');
            if ($image_path['file_path']){
                $data['logo_image'] = $image_path['file_path'];

                if (!$logo){
                    if(Logo::create($data)){
                        return sendSuccess('Logo inserted successfully...!!!', null);
                    }
                } else{
                    if (File::exists(public_path($logo->logo_image))) {
                        unlink(public_path($logo->logo_image));
                    }
                    if($logo->update($data)){
                        return sendSuccess('Logo updated successfully...!!!', null);
                    }
                }
                return sendError ('Something went wrong...!!!', null);
            }
        } catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
