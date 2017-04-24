@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
<div class="row">
<h1 class="page-header">Edit Category{{link_to_route('categories.index','Category List',null,array('class'=>'btn btn-success pull-right'))}}</h1>
	<div class="col-md-6 col-md-offset-3">							
		{{ Form::model($datas, array('route' => array('categories.update', $datas->id), 'method' => 'PUT')) }}

		<div class="form-group">					
			{{Form::label('Title', null, array('class'=> 'control-label'))}}					
			{{Form::text('title',null,array('class' => 'form-control', 'required' =>'required'))}}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}

		</div>          

		<div class="form-group">					
			{{Form::label('Parent Category:', null, array('class'=> 'control-label'))}}	

			{{Form::select('parent_id',array(''=>'Please Select')+$categories,null,array('class' => 'form-control')) }}

		</div>

		<div class="form-group">           	  

			{{Form::label('Status:', null, array('class'=> 'control-label'))}}	
			{{Form::select('status',config('myhelpers.status'),null,array('class' => 'form-control')) }}

		</div>
		{{Form::submit('Update',array('class'=>'btn btn-primary'))}}					

		{{Form::close()}}
	</div>
</div>
@endsection