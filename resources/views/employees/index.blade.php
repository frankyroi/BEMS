@extends('layouts.app')
@section('title')
    Employees
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Biosec Employee Management System</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}" > <i class="fas fa-plus-circle"></i> New Employee
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->address }}</td>
                <td>
                    <form action="{{ route('employee.archive', $employee->id) }}" method="POST">

                        <a href="{{ route('employee.show', $employee->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('employee.edit', $employee->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf

                        <button type="submit" title="archive" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $employees->links() !!}

@endsection
