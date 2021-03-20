@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Website Link Add Form</h4>
        <form class="forms-sample" method="POST" action="{{route('update.website',$website->id)}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Website Name</label>
            <input type="text" class="form-control" name="website_name" id="exampleInputUsername1" value="{{$website->website_name}}">

            @error('website_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Website Link</label>
            <input type="text" class="form-control" name="website_address" id="exampleInputUsername1" value="{{$website->website_address}}">

            @error('website_address')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>

@endsection
