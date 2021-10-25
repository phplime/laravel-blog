<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['page_title'] = "All Feature";
        $data['feature_list'] =  $data['categoryList'] = Feature::get();
        return view('backend.admin_activities.feature_list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['page_title'] = 'Create Feature';
        return view('backend.admin_activities.create_feature',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
 
        $insert = [
            'slug' => Str::slug($request->name),
            'name' => $request->name,
            'status' => 1,
        ];
        $lasId = Feature::insertGetId($insert);
        
        return redirect('/dashboard/feature')->with('successMsg','Created Success');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = [];
        $data['page_title'] = 'Edit Feature';
        $data['feature'] = Feature::find($id);
        return view('backend.admin_activities.create_feature',['data'=>$data]);
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
        $request->validate([
            'name' => 'required',
        ]);
 
        $insert = [
            'name' => $request->name,
        ];
        
        $update = Feature::where('id',$id)
        ->update($insert);
        if($update){
            return redirect('/dashboard/feature')->with('successMsg','Update Successfully');
        }else{
            return redirect('/dashboard/feature')->with('errorMsg','Somethings were wrong');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Feature::destroy($id);
       return response()->json(['st'=>1,'msg'=>'Delete Success']);
    }
}
