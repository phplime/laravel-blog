<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['categoryList'] = Category::where('user_id',user()->id)->get();
        $data['page_title'] = 'All Categories';
        return view('backend.post.category_list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['page_title'] = 'Create Categories';
        return view('backend.post.create_category',['data'=>$data]);
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
            'user_id' => user()->id,
            'status' => 1,
        ];
        $lasId = Category::insertGetId($insert);
        
        return redirect('/dashboard/category')->with('successMsg','Created Success');  
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
        $data['page_title'] = 'Edit Categories';
        $data['category'] = Category::find($id);
        return view('backend.post.create_category',['data'=>$data]);
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
            'slug' => Str::slug($request->name),
            'name' => $request->name,
        ];
        
        $user = Category::where('id',$id)
        ->update($insert);
        
       return redirect('/dashboard/category')->with('successMsg','Update Successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['st'=>1,'msg'=>'Delete Success']);
    }
}
