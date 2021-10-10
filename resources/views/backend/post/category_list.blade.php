@extends('backend.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6">
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
            <h5 class="card-title">All Categories</h5> 
            <div class="card-tools">
                <a href="{{ url('/dashboard/category/create') }}" class="btn btn-secondary text-right btn-sm"><i class="fa fa-plus"></i> Add New Category</a>
            </div>
          </div>
          <div class="card-body">
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>   
                            <tr>
                              <th>Sl</th>
                              <th>Name</th>
                              <th>User id</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['categoryList'] as $key => $cat)
                              <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td>{{ $cat->name; }}</td>
                                  <td>{{ $cat->user_id; }}</td>
                                  <td>
                                  <a href="{{ url("/dashboard/category/{$cat->id}/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                                  <a href="{{ url("/delete-category/{$cat->id}") }}" class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                              </tr>
                            @empty
                              <p>Category Not Found</p>
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