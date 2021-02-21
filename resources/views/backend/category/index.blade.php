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
                  <a href="{{route('add.category')}}" class="btn btn-primary" style="float: right">Add Category</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Categry English </th>
                <th> Category Hindi </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($category as $cat)

              <tr>
                <td> {{$category->firstItem()+$loop->index}} </td>
                <td>{{$cat->category_en}} </td>
                <td>{{$cat->category_hin}}</td>
                <td>
                    <a href="{{route('edit.category',$cat->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('delete.category',$cat->id)}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$category->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection
