@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto" style="padding-left:200px;"style="text-decoration: none;">
        <p>
          
          <a href="{{route('all.post')}}" class="btn btn-success"style="text-decoration: none;">ALL Post</a>
        </p>
        <hr>
       <div>
       
       <p>Category Name: {{$post->name}}</p>
      <h3>Title: {{$post->title}}</h3>
      <img src="{{URL::to($post->image)}}" height="400px;" width="400px;">
      <p>Details: {{$post->details}}</p>

      
       </div>
      </div>
    </div>
</div>

@endsection()