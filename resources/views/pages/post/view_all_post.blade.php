@extends('menu')
@section('main_content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
			<a href="{{route('write_post')}} " class="btn btn-warning">Write Post</a>
			<hr>
			<br>
			
			<table class="table table-responsive-lg">
				<thead>
					<th>SL.</th>
					<th>Category</th>
					<th>Title</th>
					<th>Image</th>
					<th>Action</th>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($all_post as $row)
						<tr>
							<td>{{$i}}</td>
							<td> {{$row->name}} </td>
							<td> {{$row->title}} </td>
							<td> <img src="{{url($row->image)}}" height="70"> </td>
							<td>
								<a href="{{URL::to('view/single_post/'.$row->id)}}" class="btn btn-sm btn-info">View</a>
								<a id="" href="{{URL::to('edit/post/'.$row->id)}}" class="btn btn-sm btn-warning">Edit</a>
								<a id="" href="{{URL::to('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger delete_categpry">Delet</a>
							</td>
						</tr>
						@php $i++; @endphp
					@endforeach
				</tbody>
			</table>
		</div>
    </div>
    
@endsection()