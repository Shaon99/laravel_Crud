@extends('welcome')
@section('content')
<div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto " style="padding-left:200px;">
        <p>
          <a href="{{route('add.category')}}" class="btn btn-danger"style="text-decoration: none;">ADD Category</a>
          <a href="{{route('all.category')}}" class="btn btn-info"style="text-decoration: none;">All Category</a>
          <a href="{{route('write')}}" class="btn btn-success"style="text-decoration: none;">Write Post</a>
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
        <form action="{{route('store.category')}}" method="POST">
          @csrf
    <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Catagory Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name" >
            </div>
</div>
<br>
<div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug">
            </div>
</div><br>
         
          <button type="submit" class="btn btn-primary" >Submit</button>
</div>
        </form>
      </div>
    </div>
</div>

@endsection()