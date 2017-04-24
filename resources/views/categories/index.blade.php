
@extends('layouts.admin')
@section('title', 'Category List')
@section('content')
<h1 class="page-header">Category List {{link_to_route('categories.create','Create Category',[],array('class'=>'btn btn-success pull-right'))}}</h1>
 <div class="row">
        <div class="col-sm-12 col-md-12">        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SI#</th>                  
                  <th>Title</th>                  
                  <th>Parent Category Name</th> 
                  <th class="center">Created</th>
                  <th>Updated</th>
                  <th>Status</th>                     
                  <th>Action</th> 
                </tr>
              </thead>
              <tbody>
             @php  $options=''; $i=1; @endphp
              @foreach ($categories as $data)         
                  <tr>
                  <td>{{$i}}</td>                  
                  <td>{{$data->title}}</td>                  
                  <td>
                  {{$data->categories['title']}}
                  @if ($data->categories['id']==0)
                    {{'Root Category'}}
                  @endif
                  </td>
                  <td>{{date('d M Y',strtotime($data->created_at))}}</td>
                  <td>{{date('d M Y',strtotime($data->created_at))}}</td>
                  <td>{{$data->status}}</td>                  
                  <td>                   	
                    {{Form::open(array('url' => '/admin/categories/' . $data->id, 'class' => 'pull-right')) }}
                              {{ Form::hidden('_method', 'DELETE') }}
                              {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
                     <a class="btn btn-small btn-info" href=" {{ route('categories.edit',$data->id) }}">Edit</a>       
                  </td>  
                </tr>
                 @php $i=$i+1; @endphp             
                 @endforeach                           
                </tbody>
                </table>
                </div>
                
        </div>
      </div>      	
@stop