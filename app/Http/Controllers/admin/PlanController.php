<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Feature;
use Illuminate\Support\Str;

class PlanController extends Controller
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
        $data['planList'] =  Plan::get();
        return view('backend.admin_activities.planList',compact('data'));
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
        $data['feature_list'] =  Feature::get();
        return view('backend.admin_activities.createPlan',['data'=>$data]);
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
            'slug' => 'required',
            'type' => 'required',
            'feature_id' => 'required',
        ]);
        $insert = [
            'slug' => Str::slug($request->slug),
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'feature_id' => json_encode($request->feature_id),
            'status' => 1,
        ];
        echo '<pre>';print_r($insert);exit();
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
