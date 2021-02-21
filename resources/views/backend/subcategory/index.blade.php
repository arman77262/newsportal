@extends('admin.admin_master')
@section('admin')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">All Sub Category</h4>
              </div>
              <div class="col-sm-6">
                  <a href="{{route('add.subcategory')}}" class="btn btn-primary" style="float: right">Add Sub Category</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Root Category </th>
                <th> SubCategry English </th>
                <th> SubCategory Hindi </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($subcat as $scat)

              <tr>
                <td> {{$subcat->firstItem()+$loop->index}} </td>
                <td>{{$scat->category_en}}</td>
                <td>{{$scat->subcategory_en}} </td>
                <td>{{$scat->subcategory_hin}}</td>
                <td>
                    <a href="{{route('edit.subcategory',$scat->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('delete.subcategory',$scat->id)}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$subcat->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection
