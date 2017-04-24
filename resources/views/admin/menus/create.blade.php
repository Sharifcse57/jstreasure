@extends('layouts.admin')
@section('title', 'Create Category')
@section('css')
<style>
.hidden{
	display: none;
}
</style>
@stop
@section('content')
<div class="row">
	<h1 class="page-header">Menu Create {{link_to_route('menus.index','Menu List',null,array('class'=>'btn btn-success pull-right'))}}</h1>
	<div class="col-md-6 col-md-offset-2 ">
		{{ Form::model(Request::old(),array('route' => array('menus.store'),'class'=>'form-horizontal','data-parsley-validate' => '')) }}
		<div class="form-group">

			{{Form::label('Select page type:', null, array('class'=> 'control-label'))}}

			{{ Form::select('type',config('myhelpers.menutype'),null, ['id'=>'type','class' => 'form-control']
			) }}

			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}

		</div>

		<div id="external"  class="form-group hidden">
			{{Form::label('External', null, array('class'=> 'control-label'))}}
			{{Form::text('link',null,array('class' => 'form-control','placeholder' =>'Enter External Link'))}}
		</div>

		<div id="internal"  class="form-group">

			{{Form::label('Page Title:', null, array('class'=> 'control-label'))}}
			{{Form::select('page_slug',array('0'=>'Please Select')+$pages,null,array('class' => 'form-control')) }}
			{{ $errors->first('page_slug', '<p class="text-danger">:message</p>' ) }}
		</div>

		<div class="form-group">
			{{Form::label('Location', null, array('class'=> 'control-label'))}}
			{{Form::text('location',null,array('class' => 'form-control', 'required' =>'required', 'placeholder' =>'Enter Location'))}}
			{{ $errors->first('location', '<p class="text-danger">:message</p>' ) }}
		</div>
		<div class="form-group">
			{{Form::label('Sort Position', null, array('class'=> 'control-label'))}}
			{{Form::number('sort_position',null,array('class' => 'form-control', 'required' =>'required', 'placeholder' =>'Sort Position'))}}
			{{ $errors->first('sort_postion', '<p class="text-danger">:message</p>' ) }}
		</div>

		<div class="form-group">

			{{Form::label('Status:', null, array('class'=> 'control-label'))}}

			{{ Form::select('status',config('myhelpers.status') ,null, ['id'=>'type','class' => 'form-control']
			) }}

			{{ $errors->first('title', '<p class="text-danger">:message</p>' ) }}
		</div>

	    {{Form::submit('Submit',array('class'=>'btn btn-primary'))}}
		{{ Form::close() }}

	</div>
</div>

@endsection

@section('script')
<script>
    $('#type').change('click',function () {
    	 var typevalue = $(this).val();
    	 if(typevalue=='external'){

    	 $("#internal").slideToggle("slow", function() {
    	 	$(this).addClass("hidden");
    	 	$("#external").removeClass("hidden");
    	 });

    	 }else{

	 	  $("#internal").slideToggle("slow", function() {
    	 	  $(this).removeClass("hidden");
    	 	  $("#external").addClass("hidden");

    	   });
    	 }
    });
</script>

@stop




