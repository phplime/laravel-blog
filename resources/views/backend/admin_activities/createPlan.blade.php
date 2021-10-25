@extends('backend.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
          <div class="card-header"> <h5 class="m-0 mr-5">Create Plan</h5></div>
            <form method="POST" class="adminForm" action="{{isset($data['feature'])?url("dashboard/plan/{$data['plan']->id}") :url('dashboard/plan/') }}">
            @csrf
        
            @if(isset($data['plan']))
                @method('PUT')
            @endif
        
                <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                         <div class="card-content">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input id="Name" class="form-control" type="text" name="name" placeholder="Name" value="{{  old('name', !empty($data['plan']->name)?$data['plan']->name:'') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="Name">Slug</label>
                            <input id="slug" class="form-control" type="text" name="slug" placeholder="slug" value="{{  old('slug', !empty($data['plan']->slug)?$data['plan']->slug:'') }}"  {{ !empty($data['feature'])?'readonly':'' }}>
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        </div>
                        <div class="form-group mb-15">
                            <label for="Name">Type</label>
                            <div class="nice-selects">
                                <select name="type" id="planType" class="form-control niceSelect wide" >
                                    <option value="">Select Type</option>
                                    <option value="free" {{ old('type',!empty($data['plan']->type) && $data['plan']->type=="free"?"selected":'' )}}>Free</option>
                                    <option value="week" {{ !empty($data['plan']->type) && $data['plan']->type=="week"?"selected":'' }}>Weekly</option>
                                    <option value="fifteen" {{ !empty($data['plan']->type) && $data['plan']->type=="fifteen"?"selected":'' }}>14 days</option>
                                    <option value="month" {{ !empty($data['plan']->type) && $data['plan']->type=="month"?"selected":'' }}>Monthly</option>
                                    <option value="year" {{ !empty($data['plan']->type) && $data['plan']->type=="year"?"selected":'' }}>Yearly</option>
                                    <option value="lifetime" {{ !empty($data['plan']->type) && $data['plan']->type=="lifetime"?"selected":'' }}>Life time</option>
                                </select>
                            </div>
                             <span class="text-danger">{{ $errors->first('type') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="Name">Price</label>
                            <input id="price" class="form-control" type="text" name="price" placeholder="price" value="{{  old('price', !empty($data['plan']->price)?$data['plan']->price:'') }}"  {{ !empty($data['feature'])?'readonly':'' }}>
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card-content">
                            <ul class="featureList">
                                @forelse ($data['feature_list'] as $feature)
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="feature_id[]" value="{{ $feature->id }}" type="checkbox" id="customCheckbox{{ $feature->id }}" >
                                            <label for="customCheckbox{{ $feature->id }}" class="custom-control-label pointer">{{ $feature->name }}</label>
                                        </div>
                                        
                                    </li>
                                @empty
                                    <li>Data not found</li>
                                @endforelse
                                
                            </ul>
                        </div>
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