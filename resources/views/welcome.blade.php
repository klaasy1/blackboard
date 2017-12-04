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
		      <h1>Welcome</h1> 
		    </div>
		  </div>
	      </div>
        </div>            
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see the list of clients >></a>
            @endif
        </div>
    </div>
</div>
@endsection