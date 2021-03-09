@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">SEO setting update</h4>
        <form class="forms-sample" method="POST" action="{{route('update.seo',$seo->id)}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Meta Author</label>
            <input type="text" class="form-control" name="meta_author" id="exampleInputUsername1" value="{{$seo->meta_author}}">

            @error('meta_author')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Meta Title</label>
            <input type="text" class="form-control" name="meta_title" id="exampleInputUsername1" value="{{$seo->meta_title}}">

            @error('meta_title')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Meta Keyword</label>
            <input type="text" class="form-control" name="meta_keyword" id="exampleInputUsername1" value="{{$seo->meta_keyword}}">

            @error('meta_keyword')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>


          <div class="form-group">
            <label for="exampleTextarea1">meta descriptionh</label>
            <textarea class="form-control" name="meta_description" id="summernote" rows="4">{{$seo->meta_description}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleTextarea1">google analytice</label>
            <textarea class="form-control" name="google_analytice" id="summernote1" rows="4">{{$seo->google_analytice}}</textarea>
          </div>


          <div class="form-group">
            <label for="exampleInputUsername1">google verification</label>
            <input type="text" class="form-control" name="google_verification" id="exampleInputUsername1" value="{{$seo->google_verification}}">

            @error('google_verification')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>


          <div class="form-group">
            <label for="exampleTextarea1">alexa analytice</label>
            <textarea class="form-control" name="alexa_analytice" id="summernote2" rows="4">{{$seo->alexa_analytice}}</textarea>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Update Social</button>
        </form>
      </div>
    </div>
  </div>

@endsection
