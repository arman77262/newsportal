@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="col-sm-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Video Galerry</h4>
        <p class="card-description"> Video Gallery Fro Video Add</p>
        <form class="forms-sample" action="{{route('store.video')}}" method="POST">

          @csrf


            <div class="form-group">
                <label for="exampleInputName1">Photo Title</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Video Title" name="title">

                @error('title_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputName1">Video Embed Code</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Video Embed Code" name="embed_code">

                @error('title_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputName1">Type</label>
                <select class="form-control" name="type">
                    <option value="1">Big Video</option>
                    <option value="0">Small Video</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Post Video</button>

            </div> {{-- End Row --}}


        </form>
      </div>
    </div>
  </div>




@endsection

