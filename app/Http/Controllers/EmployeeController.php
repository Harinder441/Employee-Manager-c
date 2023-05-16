<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Employees/Index', [
            'employees' => Employee::all(),
        ]);
    }

     public function store(Request $request): RedirectResponse
    {
  
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'dateOfJoining' => 'required|date',
        ]);
    
        Employee::create($validated);
    
        return redirect(route('employees.index'));
    }
   
   
    public function update(Request $request, Employee $employee):RedirectResponse
    {
  
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'dateOfJoining' => 'required|date',
        ]);
    
        $employee->update($validated);
    
        return redirect(route('employees.index'));
    }
  
    public function destroy(Employee $employee):RedirectResponse
    {
        $employee->delete();
        return redirect(route('employees.index'));
    }
}
