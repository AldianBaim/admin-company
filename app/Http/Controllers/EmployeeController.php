<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get data companies table
        $employees = Employee::all();

        return view('/employee.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employee.add', compact('companies'));
    }

    public function store(Request $request)
    {
        $employee = new Employee;
        $fullname = $request->first_name . ' ' . $request->last_name;
        $employee->fullname = $fullname;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect('/home')->with('message', 'New employee has been added!');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(Employee $employee, Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $employee->fullname = $request->fullname;
        $employee->company_id = $request->company_id;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->save();

        return redirect('/employee')->with('message', 'Employee has been updated!');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return back()->with('message', 'Employee has been deleted!');
    }
}
