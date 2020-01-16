@extends('menu')
@section('main_content')
	<div class="row">
		<div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
			<a href=" {{route('add_category')}} " class="btn btn-success">Add Category</a>
			<a href="{{route('view.category')}}" class="btn btn-info">View Category</a>
			<hr>
			<br>
			<div>
				<ol>
					<li>Category Name: {{$single_category->name}}</li>
					<li>Category Slug: {{$single_category->slug}}</li>
					<li>Created At: {{$single_category->created_at}} </li>
				</ol>
			</div>
		</div>
    </div>
@endsection()