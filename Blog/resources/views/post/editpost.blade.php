@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto" style="padding-left:200px;">
        <p>
          <a href="{{route('all.post')}}" class="btn btn-success"style="text-decoration: none;">All Post</a>
        </p>
        <hr>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{url('update/post/'. $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title"  >
            </div>
</div>
<div class="form-group ">
              <label>Catagory</label>
              <select class="form-control" name="category_id">
              @foreach($category as $row)
                <option value="{{ $row->id }}"<?php if($row->id == $post->category_id) echo "selected"; ?>>{{$row->name}}</option>
                @endforeach
            </select>
           
            </div>
          <div class="control-group">
            <div class="form-group col-xs-12">
              <label>New Image</label>
              <input type="file" class="form-control" name="image"><br>
              Old Image:<img src="{{URL::to($post->image)}}" height="100px;" width="100px;" >
              <input type="hidden" name="old_photo" value="{{ $post->image}}"><br>

            </div>
            </div>
          <div class="control-group">
            <div class="form-group ">
              <label>Details</label>
              <textarea rows="5" class="form-control"  name="details" >
             {{$post->details}}
              </textarea>            
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
</div>
        </form>
      </div>
    </div>
</div>

@endsection()