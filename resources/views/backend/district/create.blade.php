@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">District Add Form</h4>
        <form class="forms-sample" method="POST" action="{{route('store.district')}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">District English</label>
            <input type="text" class="form-control" name="district_en" id="exampleInputUsername1" placeholder="Input District English">

            @error('district_en')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">District Hindi</label>
            <input type="text" class="form-control" name="district_hin" id="exampleInputUsername1" placeholder="Input District Hindi">

            @error('district_hin')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection
