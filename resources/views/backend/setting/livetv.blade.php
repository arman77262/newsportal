@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">Live Tv Update</h4>
              </div>
              <div class="col-sm-6">
                  @if ($tv->status == 1)
                  <a href="{{route('deactive.livetv',$tv->id)}}" class="btn btn-danger" style="float: right">Deactive</a>
                  @else
                  <a href="{{route('active.livetv',$tv->id)}}" class="btn btn-primary" style="float: right">Active</a>
                  @endif


              </div>


          </div>

        <form class="forms-sample" method="POST" action="{{route('update.livetv',$tv->id)}}">
            @csrf

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="exampleTextarea1">Live Tv Embed Code</label>
                    </div>
                    <div class="col-sm-6">
                        @if ($tv->status == 1)
                        <small class="text-success" style="float: right">Now live tv are active</small>
                        @else
                        <small class="text-danger" style="float: right">Now live tv are Deactive</small>
                        @endif
                    </div>
                </div>

                <textarea class="form-control" name="embed_code" id="summernote1" rows="4">{{$tv->embed_code}}</textarea>
            </div>

          <button type="submit" class="btn btn-primary mr-2">Update Prayer</button>
        </form>
      </div>
    </div>
  </div>

@endsection
