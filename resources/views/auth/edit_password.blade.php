@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
<div class="row">
<h1 class="page-header">Edit Page{{link_to_route('users.index','User List',null,array('class'=>'btn btn-success pull-right'))}}</h1>

	<div class="col-md-6 col-md-offset-3">
		{{ Form::open(array('route' => array('users.update', 1), 'method' => 'PUT')) }}

		<div class="form-group">
			{{Form::label('Password', null, array('class'=> 'control-label'))}}
			{{Form::text('password',null,array('class' => 'form-control', 'required' =>'required'))}}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}
		</div>



		{{Form::submit('Update',array('class'=>'btn btn-primary'))}}

		{{Form::close()}}
	</div>
</div>
@endsection