<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display listing of active employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('status','active')->paginate(5);

        return view('employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


     /**
     * Display listing of active employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $employees = Employee::where('status','archive')->paginate(5);

        return view('employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $employee = Employee::create($request->all());

        //log activity
        ActivityLog::create([
            'activity' => 'Create',
            'employee_id' => $employee->id,
        ]);
       
        return redirect()->route('employee.list')
        ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified employee details.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //log activity
        ActivityLog::create([
            'activity' => 'View',
            'employee_id' => $employee->id,
        ]);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }
    
    /**
     * Update the specified employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $employee->update($request->all());

        //log activity
        ActivityLog::create([
            'activity' => 'Update',
            'employee_id' => $employee->id,
        ]);
        return redirect()->route('employee.list')
            ->with('success', 'Employee updated successfully');
    }
    
    /**
     * Archive the specified employee.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function archive(Employee $employee)
    {
        $employee->update([ 'status' => 'archive' ]);
         //log activity
         ActivityLog::create([
            'activity' => 'Archive',
            'employee_id' => $employee->id,
        ]);
        return redirect()->route('employee.list')
            ->with('success', 'Employee Archived successfully');
    }

    /**
     * Display listing of active employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function activityLog()
    {
        $logs = ActivityLog::latest()->paginate(5);

        return view('employees.log', compact('logs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
