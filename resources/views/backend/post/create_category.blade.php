@extends('backend.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-header"> <h5 class="m-0 mr-5">Create Category</h5></div>
            <form method="POST" action="{{isset($data['category'])?url("dashboard/category/{$data['category']->id}") :url('dashboard/category/') }}">
            @csrf
        
            @if(isset($data['category']))
                @method('PUT')
            @endif
        
                <div class="card-body">
                    <div class="card-content">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input id="Name" class="form-control" type="text" name="name" placeholder="Name" value="{{ !empty($data['category'])?$data['category']->name:'' }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                      
                    </div>
                </div>
                <div class="card-footer text-right"> 
                    
                    <a href="{{ url('dashboard/category') }}" class="btn btn-default float-left">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
  
      </div>
</div>
@endsection