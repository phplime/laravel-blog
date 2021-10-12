<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Image; //Intervention Image
use Illuminate\Support\Facades\Storage; //Laravel Filesystem

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = [];
        $data['page_title'] = 'All Post';
        $posts = Post::join('categories', 'categories.id', '=', 'posts.cat_id')
              ->join('users', 'users.id', '=', 'posts.user_id')
              ->where('posts.user_id',user()->id)
              ->get(['posts.*', 'categories.name as category_name','users.name as username']);
        
        $data['postList'] =  $posts;
      
        return view('backend.post.post_list',compact('data'));
        // return view('backend.post.post_list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['page_title'] = 'Create Post';
        $data['categoryList'] =  Category::where('user_id',user()->id)->get();
        return view('backend.post.create_post',['data'=>$data]);
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
            'title' => 'required',
            'cat_id' => 'required',
            'details' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        
       
       
        $insert = [
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'user_id' => user()->id,
            'cat_id' => $request->cat_id,
            'details' => $request->details,
            'tags' => json_encode($request->tags),
            'status' => $request->status,
        ];
        $lastId = Post::insertGetId($insert);
       
        $img = $this->fileUpload($request->file('imageFile'),$lastId);
         
         return redirect('/dashboard/post')->with('successMsg','Created Success');  
    }

     public function fileUpload($req,$lastId,$type=1){
     

        if($req) {
            foreach($req as $file)
            {
                $ext = strtolower($file->getClientOriginalExtension()); // You can use also getClientOriginalName()
                $image_full_name = time().rand(1,50).'.'.$ext;
                $img_path = 'uploads/';
                $upload_path = public_path().'/uploads/';    //Creating Sub directory in Public folder to put image
                $image_url = $img_path.$image_full_name;
                $success = $file->move($upload_path,$image_full_name);
                if($type==1){
                  $imgData =  $image_url ;
                }else{
                   $imgData[] = $image_url;
                }
                
                
            }
    
            if($type==1){
                $insert = [
                    'image' => $imgData,
                    'thumb' => $imgData,
                ]; 
                $update = Post::where('id',$lastId)
                    ->update($insert); 
            }else{
                $insert = [
                    'image' => json_encode($imgData),
                    'thumb' => json_encode($imgData),
                ]; 
                $update = Post::where('id',$lastId)
                    ->update($insert); 
            }

        }
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
        $data['page_title'] = 'Edit Post';
        $data['categoryList'] =  Category::where('user_id',user()->id)->get();
        $data['post'] = Post::find($id);
        return view('backend.post.create_post',['data'=>$data]);
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
            'title' => 'required',
            'cat_id' => 'required',
            'details' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
 
        $insert = [
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'user_id' => user()->id,
            'cat_id' => $request->cat_id,
            'details' => $request->details,
            'tags' => json_encode($request->tags),
            'status' => $request->status,
        ];
         $lastId = Post::where('id',$id)
        ->update($insert);
        $img = $this->imgResize($request->file('imageFile'),$id);
         return redirect('/dashboard/post')->with('successMsg','Created Success');  
    }
    
   public function imgResize($req,$id,$type=1)
    {
       if ($req) {
 
             foreach($req as $file){
    
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
    
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
                //get file extension
                $extension = $file->getClientOriginalExtension();
    
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
            
                $upload_dir = 'profile_images/';
                $thumbnail_dir = $upload_dir.'thumbnail/';
                $thumbnail_store__dir = $upload_dir.'thumbnail/';
                
                Storage::put('public/'.$upload_dir. $filenametostore, fopen($file, 'r+'));
                Storage::put('public/'.$thumbnail_dir. $filenametostore, fopen($file, 'r+'));
    
                //Resize image here
                $thumbnailpath = public_path('storage/'.$thumbnail_store__dir.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);
                
                if($type==1){
                  $imgData =  $filenametostore ;
                }else{
                   $imgData[] = [
                       'thumb' => $thumbnail_dir.$filenametostore,
                       'image' => $upload_dir.$filenametostore
                   ];
                } 
               
            }
             
            if($type==1){
                $old_img = Post::find($id);
                $img_path = 'storage/'.$old_img->image;
                $thumb_path = 'storage/'.$old_img->thumb;
                 
                if(file_exists($img_path) && !empty($old_img->image)){
                     unlink($img_path);
                } 
                 
                if(file_exists($thumb_path) && !empty($old_img->thumb)){
                    unlink($thumb_path);
                }
                 
                $insert = [
                    'image' => $upload_dir.$imgData,
                    'thumb' => $thumbnail_dir.$imgData,
                ]; 
                $update = Post::where('id',$id)
                    ->update($insert); 
            }elseif($type==2){
                
                $insert = [
                    'images' => json_encode($imgData),
                ];
                $update = Post::where('id',$id)
                    ->update($insert); 
            }elseif($type==3){
                
                foreach ($imgData as $key => $img) {
                    $insert = [
                        'thumb' => $img['thumb'],
                        'image' => $img['image'],
                    ];
                   $update = Post::where('id',$id)
                    ->update($insert); 
                }
               
            }
    
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
        Post::destroy($id);
        return response()->json(['st'=>1,'msg'=>'Delete Success']);
    }
}