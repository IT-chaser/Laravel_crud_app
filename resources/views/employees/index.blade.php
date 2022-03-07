@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees</h2>
            </div>
            <div class="pull-right">
                @can('employee-create')
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Employee</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Passport Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Current Company</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($employees as $employee)
	    <tr>
	        <td>{{ ++$i }}</td>
            <td>{{ $employee->passport_number }}</td>
	        <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->phone_number }}</td>
	        <td>{{ $employee->address }}</td>
            <td>{{ $employee->current_company }}</td>
	        <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>
                    @can('employee-edit')
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('employee-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $employees->links() !!}


@endsection