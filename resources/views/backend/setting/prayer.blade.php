@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Prayer Form Update</h4>
        <form class="forms-sample" method="POST" action="{{route('update.prayer',$pray->id)}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">fajor</label>
            <input type="text" class="form-control" name="fajor" id="exampleInputUsername1" value="{{$pray->fajor}}">

            @error('fajor')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">johor</label>
            <input type="text" class="form-control" name="johor" id="exampleInputUsername1" value="{{$pray->johor}}">

            @error('johor')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">asor</label>
            <input type="text" class="form-control" name="asor" id="exampleInputUsername1" value="{{$pray->asor}}">

            @error('asor')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">magrib</label>
            <input type="text" class="form-control" name="magrib" id="exampleInputUsername1" value="{{$pray->magrib}}">

            @error('magrib')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">esha</label>
            <input type="text" class="form-control" name="esha" id="exampleInputUsername1" value="{{$pray->esha}}">

            @error('esha')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>


          <div class="form-group">
            <label for="exampleInputUsername1">jummah</label>
            <input type="text" class="form-control" name="jummah" id="exampleInputUsername1" value="{{$pray->jummah}}">

            @error('jummah')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update Prayer</button>
        </form>
      </div>
    </div>
  </div>

@endsection
