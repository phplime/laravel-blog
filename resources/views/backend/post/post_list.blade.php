@extends('backend.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-8">
      @if(session()->has('successMsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ Session::get('successMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
          <div class="card-header"> 
            <h5 class="card-title">All Posts</h5> 
            <div class="card-tools">
                <a href="{{ url('/dashboard/post/create') }}" class="btn btn-secondary text-right btn-sm"><i class="fa fa-plus"></i> Add New Post</a>
            </div>
          </div>
          <div class="card-body">
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>   
                            <tr>
                              <th>Sl</th>
                              <th>Title</th>
                              <th>User id</th>
                              <th>Categorry</th>
                              <th>Tags</th>
                              <th>image</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['postList'] as $key => $post)
                              <tr id="hide_<?= $post['id'];?>">
                                <td>{{ $key+1; }}</td>
                                <td>{{ $post->title; }}</td>
                                <td>{{ $post->username; }}</td>
                                <td>{{ $post->category_name; }}</td>
                                <td>
                                    @forelse (explode(',',json_decode($post->tags)) as $tags)
                                      <span class="badge badge-info">{{ $tags }}</span>
                                    @empty  
                                      
                                    @endforelse
                                </td>
                                <td><img src="{{ asset("storage/$post->image") }}" alt="" class="img-thumb"></td>
                                <td>
                                    @if ($post->status==1)
                                      <a href="" class="badge badge-success"><i class="fa fa-check"></i> Live</a>
                                    @else
                                      <a href="" class="badge badge-danger"><i class="fa fa-ban"></i> Hide</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url("/dashboard/post/{$post->id}/edit") }}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ url("/delete-post/{$post->id}") }}" data-id="{{ $post->id; }}" data-msg="Want to delete?" class="btn btn-danger btn-sm ajaxDelete"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                              </tr>
                            @empty
                              
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
  
      </div>
</div>
@endsection