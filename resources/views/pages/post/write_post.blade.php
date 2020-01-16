@extends('menu')
@section('main_content')
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href=" {{route('add_category')}} " class="btn btn-success">Add Category</a>
        <a href="{{route('view.category')}}" class="btn btn-info">View Category</a>
        <a href="{{route('all.post')}} " class="btn btn-warning">View All Post</a>
        <hr>
        <br>
        <form name="" id="" action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <label>Select Category</label>
            <select class="form-control" name="category_id">
              <option value="">Select Category</option>
              @foreach($category as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" name="title" class="form-control" placeholder="Post Title" id="">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea type="text" class="form-control" name="details" placeholder="Post Details" id=""></textarea>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" name="post_image" id="">
            </div>
          </div>

          <br>
          <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-success" id="" name="write_post">Write Post</button>
            </div>
        </form>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
    </div>
@endsection()