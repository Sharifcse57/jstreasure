@extends('layouts.admin')
@section('title', 'Edit Page')
@section('content')
<div class="row">
<h1 class="page-header">Edit Page{{link_to_route('pages.index','Page List',null,array('class'=>'btn btn-success pull-right'))}}</h1>
	<div class="col-md-6 col-md-offset-3">							
		{{ Form::model($datas, array('route' => array('pages.update', $datas->id), 'method' => 'PUT')) }}

		<div class="form-group">					
			{{Form::label('Title', null, array('class'=> 'control-label'))}}					
			{{Form::text('title',null,array('class' => 'form-control', 'required' =>'required'))}}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}

		</div> 

		<div class="form-group">					
			{{Form::label('Description', null, array('class'=> 'control-label'))}}
			{!! Form::textarea('description', null, array('class' => 'form-control', 'required' =>'required')) !!}					
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}

		</div>           

		{{Form::submit('Update',array('class'=>'btn btn-primary'))}}					

		{{Form::close()}}
	</div>
</div>
@endsection