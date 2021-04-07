@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="col-sm-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Photo Galerry</h4>
        <p class="card-description"> Photo Gallery Fro Photo Add</p>
        <form class="forms-sample" action="{{route('store.photo')}}" method="POST" enctype="multipart/form-data">

          @csrf


            <div class="form-group">
                <label for="exampleInputName1">Photo Title</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Photo Title" name="title">

                @error('title_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label>Photo upload</label>
                <input type="file" name="photo" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputName1">Type</label>
                <select class="form-control" name="type">
                    <option value="1">Big Photo</option>
                    <option value="0">Small Photo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Post Photo</button>

            </div> {{-- End Row --}}


        </form>
      </div>
    </div>
  </div>




@endsection
