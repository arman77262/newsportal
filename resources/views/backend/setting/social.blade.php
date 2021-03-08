@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Socials Link Form</h4>
        <form class="forms-sample" method="POST" action="{{route('update.social',$social->id)}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Facebook</label>
            <input type="text" class="form-control" name="facebook" id="exampleInputUsername1" value="{{$social->facebook}}">

            @error('facebook')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Twitter</label>
            <input type="text" class="form-control" name="twitter" id="exampleInputUsername1" value="{{$social->twitter}}">

            @error('twitter')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Youtube</label>
            <input type="text" class="form-control" name="youtube" id="exampleInputUsername1" value="{{$social->youtube}}">

            @error('youtube')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Linkedin</label>
            <input type="text" class="form-control" name="linkedin" id="exampleInputUsername1" value="{{$social->linkedin}}">

            @error('linkedin')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Instagram</label>
            <input type="text" class="form-control" name="instagram" id="exampleInputUsername1" value="{{$social->instagram}}">

            @error('instagram')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update Social</button>
        </form>
      </div>
    </div>
  </div>

@endsection
