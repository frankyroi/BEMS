@extends('layouts.app')
@section('title')
    Activity Log
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Biosec Employee Management System - Activity Log</h2>
            </div>
        </div>
    </div>


    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Created</th>
            <th>Activity</th>
            <th>Employee</th>
          
        </tr>
        @foreach ($logs as $log)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $log->created_at }}</td>
                <td>{{ $log->activity }}</td>
                <td>{{ $log->employee->name }}</td>
            </tr>
        @endforeach
    </table>

    {!! $logs->links() !!}

@endsection
