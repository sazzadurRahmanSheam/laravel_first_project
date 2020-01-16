@extends('menu')
@section('main_content')
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href=" {{route('add_category')}} " class="btn btn-success">Add Category</a>
        <a href="{{route('view.category')}}" class="btn btn-info">View Category</a>
        <hr>
        <br>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{route('store.category')}} " method="post" name="" id="">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category name</label>
              <input type="text" class="form-control" name="name" placeholder="Category Name" id="" >
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug name</label>
              <input type="text" class="form-control" name="slug" placeholder="Slug Name" id="" >
            </div>
          </div>

          <br>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="" name="add_category">Add category</button>
          </div>
        </form>
      </div>
    </div>
@endsection()