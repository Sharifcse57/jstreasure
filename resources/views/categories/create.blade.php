
@extends('layouts.admin')
@section('title', 'Create Category')
@section('content')
<div class="row">
	<h1 class="page-header">Category Create {{link_to_route('categories.index','Category List',null,array('class'=>'btn btn-success pull-right'))}}</h1>
	<div class="col-md-6 col-md-offset-2 ">
		{{ Form::model(Request::old(),array('route' => array('categories.store'),'class'=>'form-horizontal')) }}		
		<div class="form-group">			
			{{Form::label('Title', null, array('class'=> 'control-label'))}}
			{{Form::text('title',null,array('class' => 'form-control', 'required' =>'required', 'placeholder' =>'Enter Category Title'))}}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}
		</div>          

		<div class="form-group">

			{{Form::label('Parent Category:', null, array('class'=> 'control-label'))}}
			{{Form::select('parent_id',array('0'=>'Please Select')+$categories,null,array('class' => 'form-control')) }}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}              
		</div>

		<div class="form-group">        	  

			{{Form::label('Status:', null, array('class'=> 'control-label'))}}

			{{Form::select('status',config('myhelpers.status'),null,array('class' => 'form-control')) }}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}   

		</div>

		{{Form::submit('Submit',array('class'=>'btn btn-primary'))}}

		{{ Form::close() }}

	</div> 
</div>

@endsection




