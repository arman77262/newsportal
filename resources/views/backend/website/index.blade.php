@extends('admin.admin_master')
@section('admin')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">All Important Website</h4>
              </div>
              <div class="col-sm-6">
                  <a href="{{route('add.website')}}" class="btn btn-primary" style="float: right">Add Website</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Website Name </th>
                <th> Website Address </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($website as $web)

              <tr>
                <td> {{$website->firstItem()+$loop->index}} </td>
                <td>{{$web->website_name}} </td>
                <td>{{$web->website_address}}</td>
                <td>
                    <a href="{{route('edit.link',$web->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('delete.link',$web->id)}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$website->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection
