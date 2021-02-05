@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto" style="padding-left:200px;">
        <p>
          <a href="{{route('add.category')}}" class="btn btn-danger" style="text-decoration: none;">ADD Category</a>
          <a href="{{route('all.category')}}" class="btn btn-info"style="text-decoration: none;">All Category</a>
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
        <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title"  >
            </div>
</div>
<div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <select class="form-control" name="category_id">
              @foreach($category as $row)
                <option value="{{ $row->id }}">{{$row->name}}</option>
                @endforeach
            </select>
           
            </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image</label>
              <input type="file" class="form-control" name="image">
            </div>
            </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name="details" ></textarea>            
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
</div>
        </form>
      </div>
    </div>
</div>

@endsection()