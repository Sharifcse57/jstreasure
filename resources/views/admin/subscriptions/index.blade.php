@extends('layouts.admin')
@section('title', 'Subscription List')
@section('content')
 <div class="row">
        <div class="col-sm-12 col-md-12">        
          <div class="table-responsive">
            <table class="table table-striped">

              <thead>
                <tr>
                  <th>SI#</th>    
                  <th>Customer Name</th>              
                  <th>Email</th>  
                  <th>Contact No</th>       
                  <th>Ip Address</th>   
                  <th>Subscribe Status</th>  
                  <th>Action</th>               
                </tr>
              </thead>
              <tbody>
             @php ($i=1)
              @foreach ($subscriptions as $data)         
                  <tr>
                  <td>{{$i}}</td> 
                  <td>{{$data->name}}</td>                           
                  <td>{{ $data->email }}</td> 
                  <td>{{ $data->phone }}</td>    
                  <td>{{ $data->visitor_ip }}</td>   
                  <td>{{ $data->unsubscribed }}</td>              
                  <td>            	

                    {!! Form::delete(route('subscriptions.destroy',array($data->id))) !!} 
                </tr>
                 @php ($i=$i+1) 
                @endforeach 
                </tbody>               
                </table>                
                </div>                
        </div>
      </div>      	
@stop