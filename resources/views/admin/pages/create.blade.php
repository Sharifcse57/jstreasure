@extends('layouts.admin')
@section('title', 'Create Page')
@section('content')
<div class="row">
	<h1 class="page-header">Page Create {{link_to_route('pages.index','Page List',null,array('class'=>'btn btn-success pull-right'))}}</h1>
	<div class="col-md-6 col-md-offset-2 ">
		{{ Form::model(Request::old(),array('route' => array('pages.store'),'class'=>'form-horizontal','data-parsley-validate' => '')) }}		
		<div class="form-group">			
			{{Form::label('Title', null, array('class'=> 'control-label'))}}
			{{Form::text('title',null,array('class' => 'form-control', 'placeholder' =>'Enter Page Title.....','minlength'=>"4", 'required' => '', 'maxlength' => '250'))}}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}
		</div>

		<div class="form-group">
		{{Form::label('Description', null, array('class'=> 'control-label'))}}
		{!! Form::textarea('description', '', []) !!}
		</div>

		{{Form::submit('Submit',array('class'=>'btn btn-primary'))}}
		{{ Form::close() }}

	</div> 
</div>
@endsection 



