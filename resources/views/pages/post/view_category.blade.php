@extends('menu')
@section('main_content')
	<div class="row">
		<div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
			<a href=" {{route('add_category')}} " class="btn btn-success">Add Category</a>
			<a href="{{route('view.category')}}" class="btn btn-info">View Category</a>
			<hr>
			<br>
			
			<table class="table table-responsive-lg">
				<thead>
					<th>SL.</th>
					<th>Category Name</th>
					<th>Slug</th>
					<th>Action</th>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($category as $row)
						<tr>
							<td>{{$i}}</td>
							<td> {{$row->name}} </td>
							<td> {{$row->slug}} </td>
							<td>
								<a href="{{URL::to('view/single_category/'.$row->id)}}" class="btn btn-sm btn-info">View</a>
								<a id="" href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-warning">Edit</a>
								<a id="" href="{{URL::to('Delete/single_category/'.$row->id)}}" class="btn btn-sm btn-danger delete_categpry">Delet</a>
							</td>
						</tr>
						@php $i++; @endphp
					@endforeach
				</tbody>
			</table>
		</div>
    </div>
    
@endsection()