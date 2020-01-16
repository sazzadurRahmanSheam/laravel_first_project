@extends('menu')
@section('main_content')
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $row)
        <div class="post-preview">
          <a href="{{URL::to('view/single_post/'.$row->id)}}">
            <h2 class="post-title">
              {{$row->title}}
            </h2>
            <img src="{{url($row->image)}}" class="img-responsive" height="300">
          </a>
          <p class="post-meta">Category: {{$row->name}} on Slug: {{$row->slug}}</p>
        </div>
        <hr>
        @endforeach
        <!-- Pager -->
        <div class="clearfix">
          <div class="float-right">
            {{$posts->links()}}
          </div>
        </div>
      </div>
    </div>
@endsection()
