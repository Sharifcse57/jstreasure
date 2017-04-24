@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
<div class="row">
<h1 class="page-header">Edit Page{{link_to_route('users.index','User List',null,array('class'=>'btn btn-success pull-right'))}}</h1>

	<div class="col-md-6 col-md-offset-3">
		{{ Form::model($users, array('route' => array('users.update', $users->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{Form::label('Name', null, array('class'=> 'control-label'))}}
			{{Form::text('name',null,array('class' => 'form-control', 'required' =>'required'))}}
			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}
		</div>

		<div class="form-group">
            <label for="Role" class="control-label col-sm-2">Role</label>
            <div>
            {{Form::select('role_id',$roles,null,array('class' => 'form-control'))}}
            </div>
             {{ $errors->first('role_id', '<p class="text-danger">:message</p>' ) }}
        </div>

        <div class="form-group">
            <label for="email" class="control-label col-sm-2">Status</label>
            <div>
            {{Form::select('status',config('myhelpers.status'),null,array('class' => 'form-control'))}}
            </div>

        </div>

		{{Form::submit('Update',array('class'=>'btn btn-primary'))}}

		{{Form::close()}}
	</div>
</div>
@endsection