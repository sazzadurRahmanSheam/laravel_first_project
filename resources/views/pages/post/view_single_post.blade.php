@extends('menu')
@section('main_content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
			<a href="{{route('all.post')}} " class="btn btn-warning">View All Post</a>
			<hr>
			<br>
			<div>
				<h2>{{$single_post->title}}</h2>
				<img class="img-thumbnail" src="{{url($single_post->image)}}">
				<p>Post Category: {{$single_post->name}}</p>
				<p>{{$single_post->details}}</p>
			</div>
		</div>
    </div>
@endsection()