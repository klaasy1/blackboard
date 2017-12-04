@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
	    
	    @if(Session::has('flash_message'))
	    <div class="alert alert-success">
		{{ Session::get('flash_message') }}
	    </div>
	    @endif

	    <div class="panel" style="padding: 30px;">
                <div class="panel-heading">
		  <div class="row">
		    <div class="col-md-6 col-sm-12 col-xl-12">
		      <h1>Clients</h1> 
		    </div>
		    @if(Auth::check())
		    <div col-md-6 col-sm-12 col-xl-12>
		      <a href="{{ url('/client/create') }}" class="btn btn-success btn-md pull-right">
			<span class="glyphicon glyphicon-plus"></span> Create 
		      </a>
		    </div>
		    @endif
		  </div>
	      </div>
            </div>
            
            @if(Auth::check())
            <div class="panel panel-success">
                    
                      <!-- Table -->
                      <table class="table table-bordered">
                          <tr>
                              <th>Name</th>
                              <th>Creater</th>
                              <th>Created</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                          @foreach($clients as $client)
                    		<tr>
                              	<td>{{ $client->name }}</td>
                              	<td>{{ $client->user_name }}</td>
                              	<td>{{ date('Y/m/d', strtotime($client->created_at)) }}</td>
                              	<td><?=  $client->deleted_at != 'null' ? '<span class="label label-primary">Active</span>' : '<span class="label label-danger">Inactive</span>'; ?></td>
                              	<td> 
                              		<a class="btn btn-primary btn-xs" href="{{ url('/client/view').'/'.$client->id }}">
    									<span class="glyphicon glyphicon-eye-open"></span> View
  									</a>
  									<a class="btn btn-warning btn-xs" href="{{ url('/client/edit').'/'.$client->id }}">
    									<span class="glyphicon glyphicon-pencil"></span> Edit
  									</a>
  									<a class="btn btn-danger btn-xs" href="{{ url('/client/delete').'/'.$client->id }}">
    									<span class="glyphicon glyphicon-trash"></span> Delete
  									</a>
								</td>
                            </tr>
                          @endforeach
                      </table>

            </div>
            @endif
            
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see the list of clients >></a>
            @endif
        </div>
    </div>
</div>
@endsection