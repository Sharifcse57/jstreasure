@extends('layouts.admin')
@section('content')
@php
	$image=$data->images;
@endphp
	
	<h2>{{$data->title}}</h2>
	@foreach ($image as $element)
		<img src="{{ asset('images/sites/product/'.$element->id.'.'.$element->img) }}" alt="" style="width:250px;height: 250px;">
			@endforeach
	{!!$data->description!!}
	<h3>{{$data->price.' BDT'}}</h3>
	<h4>{{'Status: '. $data->status}}</h4>
	<p>{{showDateWithFormat($data->created_at)}}</p>

@stop
