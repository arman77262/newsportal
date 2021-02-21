@extends('admin.admin_master')
@section('admin')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">All District</h4>
              </div>
              <div class="col-sm-6">
                  <a href="{{route('add.district')}}" class="btn btn-primary" style="float: right">Add District</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> District English </th>
                <th> SubCategory Hindi </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($district as $row)

              <tr>
                <td> {{$district->firstItem()+$loop->index}} </td>
                <td>{{$row->district_en}} </td>
                <td>{{$row->district_hin}}</td>
                <td>
                    <a href="{{route('edit.district',$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('delete.district',$row->id)}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$district->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection
