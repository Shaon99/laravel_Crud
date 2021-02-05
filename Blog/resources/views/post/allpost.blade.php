@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto" style="padding-left:200px;">
        <p>
          <a href="{{route('write')}}" class="btn btn-success"style="text-decoration: none;">Write Post</a>
        </p>
        <hr>
        <table class="table table-responsive">
        <tr>
        <th>SL</th>
        <th>Category</th>
        <th>Title</th>
        <th>Image</th>
        <th>Action</th>
        </tr>
        @foreach($post as $row)
        <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->title}}</td>
        <td><img src="{{URL::to($row->image)}}" width="50" height="60"></td>
        <td>
        <a href="{{ URL::to('edit/post/' .$row->id)}}" class="btn btn-sm btn-info">Edit</a>
        <a href="{{ URL::to('delete/post/' .$row->id)}}" class="btn btn-sm btn-danger" id="delete" >Delete</a>
        <a href="{{ URL::to('view/post/' .$row->id)}}" class="btn btn-sm btn-success">View</a>

        </td>

        </tr>
        @endforeach
        </table>
        
      </div>
    </div>
</div>

@endsection()