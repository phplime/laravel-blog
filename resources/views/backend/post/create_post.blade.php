@extends('backend.layouts.app')
@section('content')
<div class="row">
    @php
        if (isset($data['post'])):
            $post = $data['post'];
        else:
            $post = '';
        endif;
    @endphp
   
    <div class="col-lg-6">
        @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="card">
          <div class="card-header d-flex align-center"> <h5 class="m-0 mr-5">Create Post</h5></div>
             <form method="POST" action="{{!empty($post)?url("dashboard/post/{$post->id}") :url('dashboard/post/') }}" enctype="multipart/form-data">
                @csrf
            
                @if(!empty($post))
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="card-content">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control" type="text" name="title" placeholder="title" value="{{  old('title', !empty($post)?$post->title:'') }}">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                       
                        <div class="form-group">
                            <label for="slug">Categories</label>
                           <select name="cat_id" class="form-control" id="">
                               <option value="">Select Category </option>
                               @forelse ($data['categoryList'] as $cat)
                                  <option value="{{ $cat->id }}" {{ !empty($post->cat_id) && $post->cat_id==$cat->id?"selected":"";  }}>{{ $cat->name; }}</option> 
                               @empty
                                   <option value="">Category Not found</option>
                               @endforelse
                           </select>
                           <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea id="details" class="form-control" name="details" rows="3" placeholder="Details">{{  old('details', !empty($post)?$post->details:'') }}</textarea>
                            <span class="text-danger">{{ $errors->first('details') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="details">Tags</label>
                           <input type="text" name="tags" data-role="tagsinput" value="{{  old('tags', !empty($post)?json_decode($post->tags):'') }}">
                           <span class="text-danger">{{ $errors->first('tags') }}</span>
                        </div>
                        
                        <div class="form-group">
                        <label for=""></label>
                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview"> </div>
                        </div>  
                        <input type="file" name="imageFile[]" class="" id="images" multiple="multiple">
                        <small id="fileHelpId" class="form-text text-muted">500x400px</small>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline mr-5 pointer">
                            <input type="radio" name="status" value="1" {{ !empty($post->status) && $post->status==1?"checked":'' }}> Public
                            </label>
                            
                            <label class="radio-inline pointer">
                            <input type="radio" name="status" value="0"  {{ !empty($post->status) && $post->status==0?"checked":'' }}> Hide
                            </label>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right"> 
                    <input type="hidden" name="user_id" value="1">
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
  
      </div>
</div>
@endsection