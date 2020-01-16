@extends('menu')
@section('main_content')
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{route('all.post')}} " class="btn btn-warning">View All Post</a>
        <hr>
        <br>
        <form name="" id="" action="{{url('update/post/'.$single_post->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <label>Select Category</label>
            <select class="form-control" name="category_id">
              <option value="">Select Category</option>
              @foreach($category as $row)
                <option value="{{$row->id}}" @if($row->id == $single_post->category_id)  {{"selected"}} @endif >{{$row->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" name="title" class="form-control" value="{{$single_post->title}}" id="">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea type="text" class="form-control" name="details" id="">{{$single_post->details}}</textarea>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group ">
              <label>New Image</label>
              <input type="file" class="form-control" name="post_image" id=""><br>
              Old Image: <img src="{{url($single_post->image)}}" class="" height="40" width="70">
              <input type="hidden" name="old_image" value="{{$single_post->image}}">
            </div>
          </div>

          <br>
          <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-success" id="" name="">Update Post</button>
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