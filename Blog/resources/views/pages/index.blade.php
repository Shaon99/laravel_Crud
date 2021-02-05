@extends('welcome')
@section('content')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($post as $row)
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
           {{$row->title}} 
           </h2>
            <h3 class="post-subtitle">
             <img src="{{URL::to($row->image)}} " style="height:300px;">           
           </h3>
          </a>
          <p class="post-meta">Category
           <a href="#">{{$row->name}}</a><br>
           Slug {{$row->slug}}
           </p>
        </div>  
       

        @endforeach
        <div class="clearfix">
        {{$post->links()}}
       </div></div> </div> 
        
@endsection()