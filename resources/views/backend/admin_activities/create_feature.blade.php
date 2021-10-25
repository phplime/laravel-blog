@extends('backend.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-header"> <h5 class="m-0 mr-5">Create Features</h5></div>
            <form method="POST" action="{{isset($data['feature'])?url("dashboard/feature/{$data['feature']->id}") :url('dashboard/feature/') }}">
            @csrf
        
            @if(isset($data['feature']))
                @method('PUT')
            @endif
        
                <div class="card-body">
                    <div class="card-content">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input id="Name" class="form-control" type="text" name="name" placeholder="Name" value="{{ !empty($data['feature'])?$data['feature']->name:'' }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="Name">Slug</label>
                            <input id="slug" class="form-control" type="text" name="slug" placeholder="slug" value="{{ !empty($data['feature'])?$data['feature']->slug:'' }}"  {{ !empty($data['feature'])?'readonly':'' }}>
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        </div>
                      
                    </div>
                </div>
                <div class="card-footer text-right"> 
                    
                    <a href="{{ url('dashboard/feature') }}" class="btn btn-default float-left">Cancel</a>
                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                </div>
            </form>
        </div>
  
      </div>
</div>
@endsection