@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sub Category Update Form</h4>
        <form class="forms-sample" method="POST" action="{{route('update.subcategory',$subcat->id)}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Root Category Name</label>
            <select id="" class="form-control" name="category_id">
                <option value="">Select Category</option>
                @foreach ($cat as $row)
                    <option value="{{$row->id}}" <?php if($row->id == $subcat->category_id ) echo "selected"?>>{{$row->category_en}} | {{$row->category_hin}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Sub Category English</label>
            <input type="text" class="form-control" name="subcategory_en" id="exampleInputUsername1" value="{{$subcat->subcategory_en}}">

            @error('subcategory_en')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Sub Category Hindi</label>
            <input type="text" class="form-control" name="subcategory_hin" id="exampleInputUsername1" value="{{$subcat->subcategory_hin}}">

            @error('subcategory_hin')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update Sub Category</button>
        </form>
      </div>
    </div>
  </div>

@endsection
