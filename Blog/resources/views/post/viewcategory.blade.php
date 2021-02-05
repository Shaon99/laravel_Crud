@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto" style="padding-left:200px;"style="text-decoration: none;">
        <p>
          <a href="{{route('add.category')}}" class="btn btn-danger"style="text-decoration: none;">ADD Category</a>
          <a href="{{route('all.category')}}" class="btn btn-info"style="text-decoration: none;">All Category</a>
          <a href="{{route('write')}}" class="btn btn-success"style="text-decoration: none;">Write Post</a>
        </p>
        <hr>
       <div>
       <ol>
       <li>Category Name: {{$category->name}}</li>
       <li>Slug Name: {{$category->slug}}</li>
       <li>Created At: {{$category->created_at}}</li>

       </ol>
       </div>
      </div>
    </div>
</div>

@endsection()