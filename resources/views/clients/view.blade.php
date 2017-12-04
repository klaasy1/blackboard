@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

    	    <div class="panel" style="padding: 30px;">
                <div class="panel-heading">
    		  		<div class="row">
    		    		<div class="col-md-6 col-sm-12 col-xl-12">
    		      			<h1>View detail</h1> 
    		    		</div>
    		  		</div>
    	      	</div>
         	</div>
                
    		<div class="row">
    			<div class="col-md-6 col-sm-12 col-xs-12">
    				<table class="table table-responsive borderless">
                		<tr><td><b>Name</b></td><td>{{ $client[0]->name }}</td></tr>
                        <tr><td><b>Creater</b></td><td>{{ $client[0]->user_name }}</td></tr>
                        <tr><td><b>Created</b></td><td>{{ date('Y/m/d H:i', strtotime($client[0]->created_at)) }}</td></tr>
                        <tr><td><b>Last Updated</b></td><td>{{ date('Y/m/d H:i', strtotime($client[0]->updated_at)) }}</td></tr>
                        <tr><td><b>Status</b></td><td><?=  $client[0]->deleted_at != 'null' ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>'; ?></td></tr>
                  	</table>
                      
                  	<a class="btn btn-primary btn-xs" href="{{ url('/client/edit').'/'.$clientid }}">
						<span class="glyphicon glyphicon-pencil"></span> Edit
					</a>
					<a class="btn btn-danger btn-xs" href="{{ url('/client/delete').'/'.$clientid }}">
						<span class="glyphicon glyphicon-trash"></span> Delete
					</a>
    			</div>
    		</div>
		</div>
	</div>
</div>
@endsection