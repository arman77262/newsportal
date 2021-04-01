@extends('admin.admin_master')
@section('admin')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">All Category</h4>
              </div>
              <div class="col-sm-6">
                  <a href="{{route('add.photo')}}" class="btn btn-primary" style="float: right">Add Photo</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Photo title </th>
                <th> Photo Image </th>
                <th> Type </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($photo as $row)

              <tr>
                <td> {{$photo->firstItem()+$loop->index}} </td>
                <td>{{$row->title}} </td>
                <td><img src="{{asset($row->photo)}}" style="width: 60px; height: 60px" alt=""> </td>
                <td>
                    @if ($row->type == 1)
                        <span class="badge badge-success">Big Photo</span>
                    @else
                        <span class="badge badge-info">Small Photo</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('edit.photo',$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{-- {{route('delete.category',$cat->id)}} --}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$photo->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection
