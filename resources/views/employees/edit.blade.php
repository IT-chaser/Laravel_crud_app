@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('employees.update',$employee->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Passport Number:</strong>
		            <input type="text" name="passport_number" value="{{ $employee->name }}" class="form-control" placeholder="Passport Number">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>First Name:</strong>
		            <input type="text" name="first_name" value="{{ $employee->name }}" class="form-control" placeholder="First Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Last Name:</strong>
		            <input type="text" name="last_name" value="{{ $employee->name }}" class="form-control" placeholder="Last Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Position:</strong>
		            <input type="text" name="position" value="{{ $employee->name }}" class="form-control" placeholder="Position">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Phone Number:</strong>
		            <input type="text" name="phone_number" value="{{ $employee->name }}" class="form-control" placeholder="Phone Number">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Address:</strong>
		            <input type="text" name="address" value="{{ $employee->name }}" class="form-control" placeholder="Address">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Current Company:</strong>
		            <input type="text" name="current_company" value="{{ $employee->name }}" class="form-control" placeholder="Current Company">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection