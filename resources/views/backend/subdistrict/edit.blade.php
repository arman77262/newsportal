@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sub District Update Form</h4>
        <form class="forms-sample" method="POST" action="{{route('update.subdistrict', $subdist->id)}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Root District Name</label>
            <select id="exampleInputUsername1" class="form-control" name="district_id">
                <option value="">Select District</option>
                @foreach ($rdist as $row)
                    <option value="{{$row->id}}" <?php if($row->id == $subdist->district_id) echo "selected"?>>{{$row->district_en}} | {{$row->district_hin}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Sub District English</label>
            <input type="text" class="form-control" name="subdistrict_en" id="exampleInputUsername1" value="{{$subdist->subdistrict_en}}">

            @error('subdistrict_en')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Sub District Hindi</label>
            <input type="text" class="form-control" name="subdistrict_hin" id="exampleInputUsername1" value="{{$subdist->subdistrict_hin}}">

            @error('subdistrict_hin')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update Sub Category</button>
        </form>
      </div>
    </div>
  </div>

@endsection
