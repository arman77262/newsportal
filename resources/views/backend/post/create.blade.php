@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New Post Insert Form</h4>
        <p class="card-description"> Basic form elements </p>
        <form class="forms-sample" action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">

          @csrf

            <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="exampleInputName1">Titel English</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Title English" name="title_en">

                    @error('title_en')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputName1">Title Hindi</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Title Hindi" name="title_hin">

                    @error('title_hin')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
            </div>

            <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="exampleInputName1">Category</label>
                    <select class="form-control" id="exampleSelectGender" name="category_id">
                        <option>Select Category</option>
                        @foreach ($category as $row)
                            <option value="{{$row->id}}">{{$row->category_en}} | {{$row->category_hin}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputName1">Sub Category</label>
                    <select class="form-control" id="subcategory_id" name="subcategory_id">
                        <option selected="">Select SubCategory</option>
                    </select>
                  </div>
            </div>

            <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="exampleInputName1">District</label>
                    <select class="form-control" id="exampleSelectGender" name="district_id">
                        <option>Select District</option>
                        @foreach ($district as $row)
                            <option value="{{$row->id}}">{{$row->district_en}} | {{$row->district_hin}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputName1">Sub District</label>
                    <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                        <option selected="">Select Subdistrict</option>
                    </select>
                  </div>
            </div>


            <div class="form-group">
                <label>Image upload</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
            </div>


            <div class="row">
                <div class="form-group col-sm-6">
                  <label for="exampleInputName1">Tags English</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Tags English" name="tags_en">
                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputName1">Tags Hindi</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Tags Hindi" name="tags_hin">
                </div>
            </div>



            <div class="form-group">
                <label for="exampleTextarea1">Details English</label>
                <textarea class="form-control" name="details_en" id="summernote" rows="4"></textarea>
            </div>


            <div class="form-group">
                <label for="exampleTextarea1">Details Hindi</label>
                <textarea class="form-control" name="details_hin" id="summernote1" rows="4"></textarea>
            </div>

            <hr>
            <h4 class="text-center">Extra Option</h4>


            <div class="row" >
                <div class="form-group col-sm-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="headline" class="form-check-input" value="1"> Headline <i class="input-helper"></i></label>
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="big_thumbnail" class="form-check-input" value="1"> General Big Thumbnail <i class="input-helper"></i></label>
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="first_section" class="form-check-input" value="1"> First Section <i class="input-helper"></i></label>
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1"> Frist Section Thumbnail <i class="input-helper"></i></label>
                    </div>
                </div>
            </div> {{-- End Row --}}

          <button type="submit" class="btn btn-primary mr-2">Post News</button>
        </form>
      </div>
    </div>
  </div>

  {{-- Sub Category script code --}}
  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/get/subcategory/') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subcategory_id").empty();
                               $.each(data,function(key,value){
                                   $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+'</option>');
                               });
                      },

                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>
{{-- Sub Category script code --}}

{{-- sub district script code --}}

<script type="text/javascript">
    $(document).ready(function() {
          $('select[name="district_id"]').on('change', function(){
              var district_id = $(this).val();
              if(district_id) {
                  $.ajax({
                      url: "{{  url('/get/subdistrict/') }}/"+district_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subdistrict_id").empty();
                               $.each(data,function(key,value){
                                   $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                               });
                      },

                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>

{{-- sub district script code --}}

@endsection
