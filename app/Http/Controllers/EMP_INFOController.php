<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EMP_INFOController extends Controller
{
    public function emp_info(Request $request)
    {
        $id=$request->id;

        //type ng query (select)
        // get all data
        //$emp_info = Employee::all(); //fetch all data
        // get data by primary id
        //$emp_id = Employee::find($id); //get data based on value passed inside find()
        // get data based on condition
        //$emp_id=Employee::where([
        //    ['column_name','=','value']
        //])->get(); //<- get data based on condition indicated in where()

        // find() will return single array
        // while all() and get() will return collection

        //so ang kailangan mo dito na query is for one employee lang d b?
        //so gamit ka lang ng find() kasi may specific ka lang na data na gustong kunin


        $emp_info = Employee::find($id);//<- ito lang kaiangan mo 
        //return $emp_info;
        //hindi mo na kailngan i fetch lahat ng data in employee table
        //$emp_info = Employee::all();
        return view('employee.show_emp', compact('emp_info'));
    }

    public function create_emp(Request $request)
    {
        $company_id=$request->company_id;//<- get the passed value
        return view('employee.create_employee',compact('company_id'));
    }
}
