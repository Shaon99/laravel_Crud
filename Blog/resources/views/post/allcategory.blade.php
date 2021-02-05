@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto" style="padding-left:200px;">
        <p>
          <a href="{{route('add.category')}}" class="btn btn-danger"style="text-decoration: none;">ADD Category</a>
          <a href="{{route('all.category')}}" class="btn btn-info"style="text-decoration: none;">All Category</a>
          <a href="{{route('write')}}" class="btn btn-success"style="text-decoration: none;">Write Post</a>
        </p>
        <hr>
        <table class="table table-responsive">
        <tr>
        <th>SL</th>
        <th>Category Name</th>
        <th>Slug Name</th>
        <th>Action</th>
        </tr>
        @foreach($category as $row)
        <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->slug}}</td>
        <td>
        <a href="{{ URL::to('edit/category/' .$row->id)}}" class="btn btn-sm btn-info">Edit</a>
        <a href="{{ URL::to('delete/category/' .$row->id)}}" class="btn btn-sm btn-danger" id="delete" >Delete</a>
        <a href="{{ URL::to('view/category/' .$row->id)}}" class="btn btn-sm btn-success">View</a>

        </td>

        </tr>
        @endforeach
        </table>
        
      </div>
    </div>
</div>

@endsection()