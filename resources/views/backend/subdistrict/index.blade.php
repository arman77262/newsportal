@extends('admin.admin_master')
@section('admin')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">All Sub District </h4>
              </div>
              <div class="col-sm-6">
                  <a href="{{route('add.subdistrict')}}" class="btn btn-primary" style="float: right">Add Sub District</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Root District </th>
                <th> SubDistrict English </th>
                <th> SubDistrict Hindi </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($subdist as $row)

              <tr>
                <td> {{$subdist->firstItem()+$loop->index}} </td>
                <td>{{$row->district_en}}</td>
                <td>{{$row->subdistrict_en}} </td>
                <td>{{$row->subdistrict_hin}}</td>
                <td>
                    <a href="{{route('edit.subdistrict',$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('delete.subdistrict',$row->id)}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$subdist->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection
