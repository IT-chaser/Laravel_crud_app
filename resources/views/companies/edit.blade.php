@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
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


    <form action="{{ route('companies.update',$company->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Company Name:</strong>
		            <input type="text" name="company_name" value="{{ $company->name }}" class="form-control" placeholder="Company Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>CEO Name:</strong>
		            <input type="text" name="ceo_name" value="{{ $company->name }}" class="form-control" placeholder="CEO Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Address:</strong>
		            <input type="text" name="address" value="{{ $company->name }}" class="form-control" placeholder="Address">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Email:</strong>
		            <input type="text" name="email" value="{{ $company->name }}" class="form-control" placeholder="Email">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Website:</strong>
		            <input type="text" name="website" value="{{ $company->name }}" class="form-control" placeholder="Website">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Phone Number:</strong>
		            <input type="text" name="phone_number" value="{{ $company->name }}" class="form-control" placeholder="Phone Number">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection