
@extends('layouts.admin')
@section('title', 'Products List')
@section('content')
<h1 class="page-header">Products List {{link_to_route('product.create','Create Product',[],array('class'=>'btn btn-success pull-right'))}}</h1>
 <div class="row">
        <div class="col-sm-12 col-md-12">        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SI#</th>
                  <th>Catagory Id</th>
                  <th>Title</th>
                  <th width="30%">Description</th>
                  <th>Price</th> 
                  <th class="center">Created</th>
                  <th>Updated</th>
                  <th>Status</th>                     
                  <th>Action</th> 
                </tr>
              </thead>
              <tbody>
              
             @php  $options=''; $i=1; @endphp
              @foreach ($products as $data)         
                  <tr>
                  <td>{{$i}}</td>
                  <td>{{$data->category['title']}}</td>
                  <td>{{$data->title}}</td>
                  <td>{!!$data->description!!}</td>
                  <td>{{$data->price}}</td>
                  <td>{{date('d M Y',strtotime($data->created_at))}}</td>
                  <td>{{date('d M Y',strtotime($data->updated_at))}}</td>
                  <td>{{$data->status}}</td>                  
                  <td> 
                  	{!!  HTML::decode(link_to_route('product.edit', '<span aria-hidden="true" class="glyphicon glyphicon-edit"></span>', array($data->id)))!!}
                    {!!  HTML::decode(link_to_route('product.show', '<span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span>', array($data->id)))!!}
                    @if($data->is_deletable=='1')
                    <button type="button" data-toggle="modal" data-target="#myModal" onClick="callModal('{{$data->id}}')" class='btn btn-danger btn-xs delete-button'><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button>
                    @endif
                </tr>
                 @php $i=$i+1; @endphp             
                 @endforeach                           
                </tbody>
                </table>
                </div>
                
        </div>
      </div>

@stop