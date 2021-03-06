@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category Add Form</h4>
        <form class="forms-sample" method="POST" action="{{route('update.category',$category->id)}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Category English</label>
            <input type="text" class="form-control" name="category_en" id="exampleInputUsername1" value="{{$category->category_en}}">

            @error('category_en')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Category Hindi</label>
            <input type="text" class="form-control" name="category_hin" id="exampleInputUsername1" value="{{$category->category_hin}}">

            @error('category_hin')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update Category</button>
        </form>
      </div>
    </div>
  </div>

@endsection
