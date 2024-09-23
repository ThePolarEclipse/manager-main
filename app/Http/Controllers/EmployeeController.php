<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("employee.index", [
            "employees" => Employee::orderBy('first_name')->orderBy('last_name')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session(['return_to' => back()->getTargetUrl()]);
        return view("employee.create", [
            "company_id" => request('company_id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        // session()
        return redirect(session()->pull('return_to', route("employee.index")))
            ->with("success", "You have successfully added a new employee to the employee list.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view("employee.show", [
            "employee" => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view("employee.edit", [
            "employee" => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        session()->flash("success", "You have successfully updated the information of " . $employee->first_name . " " . $employee->last_name . ".");
        return redirect('/employees/' . $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        session()->flash("success", "You have successfully deleted " . $employee->first_name . " " . $employee->last_name . " from the employees list.");
        return redirect()->route('employee.index');
    }
}
