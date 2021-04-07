@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">All Video</h4>
              </div>
              <div class="col-sm-6">
                  <a href="{{route('add.video')}}" class="btn btn-primary" style="float: right">Add Video</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Video title </th>
                <th> Type </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($video as $row)

              <tr>
                <td> {{$video->firstItem()+$loop->index}} </td>
                <td>{{$row->title}} </td>
                <td>
                    @if ($row->type == 1)
                        <span class="badge badge-success">Big Video</span>
                    @else
                        <span class="badge badge-info">Small Video</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('edit.video',$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('delete.video',$row->id)}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$video->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection

