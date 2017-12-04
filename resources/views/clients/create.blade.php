@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

	    <div class="panel" style="padding: 30px;">
                <div class="panel-heading">
		  <div class="row">
		    <div class="col-md-12 col-sm-12 col-xl-12">
		      <h1>Create Client</h1> 
		    </div>
		  </div>
		</div>
            </div>
            
	    <form class="form-horizontal" method="POST" action="{{ url('/client/store') }}">
		{{ csrf_field() }}
		
		<input type="hidden" id="created_user_id" name="created_user_id" value="{{ $userid }}">
		
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		  <div class="col-md-12">
		    <label for="name" class="control-label">Name</label>
		    <input id="name" type="text" class="col-md-12 form-control" name="name" value="{{ old('name') }}" required autofocus>

		    @if ($errors->has('name'))
			<span class="help-block">
			    <strong>{{ $errors->first('name') }}</strong>
			</span>
		    @endif
		  </div>
		</div>

		<div class="form-group">
		    <div class="col-md-12">
			<a class="btn btn-danger btn-sm" href="{{ url('/client') }}">
			    Cancel
			</a>
			<button type="submit" class="btn btn-primary btn-sm">
			    Submit
			</button>
		    </div>
		</div>
	    </form>
                    
        </div>
    </div>
</div>
@endsection
