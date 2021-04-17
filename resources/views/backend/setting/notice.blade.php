@extends('admin.admin_master')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">Notice Setting</h4>
              </div>
              <div class="col-sm-6">
                  @if ($notice->status == 1)
                  <a href="{{route('deactive.notice',$notice->id)}}" class="btn btn-danger" style="float: right">Deactive</a>
                  @else
                  <a href="{{route('active.notice',$notice->id)}}" class="btn btn-primary" style="float: right">Active</a>
                  @endif


              </div>


          </div>

        <form class="forms-sample" method="POST" action="{{route('update.notice',$notice->id)}}">
            @csrf

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="exampleTextarea1">Notice</label>
                    </div>
                    <div class="col-sm-6">
                        @if ($notice->status == 1)
                        <small class="text-success" style="float: right">Now Notice are active</small>
                        @else
                        <small class="text-danger" style="float: right">Now Notice are Deactive</small>
                        @endif
                    </div>
                </div>

                <textarea class="form-control" name="notice" id="notice" rows="4">{{$notice->notice}}</textarea>
            </div>

          <button type="submit" class="btn btn-primary mr-2">Update Notice</button>
        </form>
      </div>
    </div>
  </div>

@endsection
