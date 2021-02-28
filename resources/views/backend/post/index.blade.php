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
                  <a href="{{route('addpost')}}" class="btn btn-primary" style="float: right">Add Post</a>
              </div>
          </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Post Title </th>
                <th> Category </th>
                <th> Sub Category </th>
                <th> District </th>
                <th> Sub District </th>
                <th> Image </th>
                <th> Details </th>
                <th> Post Date </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($posts as $post)

              <tr>
                <td> {{$posts->firstItem()+$loop->index}} </td>
                <td>{{Str::limit($post->title_en,10)}} </td>
                <td>{{$post->category_en}}</td>
                <td>{{$post->subcategory_en}}</td>
                <td>{{$post->district_en}}</td>
                <td>{{$post->subdistrict_en}}</td>
                <td><img src="{{ url($post->image) }}" style="width: 50px; height:50px;" alt=""></td>
                <td>{{Str::limit($post->details_en,20)}}</td>
                <td>{{ Carbon\Carbon::parse($post->post_date)->diffforHumans() }}</td>
                <td>
                    <a href="{{route('edit.post',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{-- {{route('delete.category',$cat->id)}} --}}" onclick="return confirm('Are You Sure Want To Delete ?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
          {{$posts->links('paginate')}}
        </div>
      </div>
    </div>
  </div>


@endsection
