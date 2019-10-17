<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_company_data(Request $request){

        $comp = new Company();
        $comp->name = $request->input('name');
        $comp->email = $request->input('email');
        $comp->website = $request->input('website');
        if($comp->save()){
            return "success";
        }else{
            return "error";
        }

       
     }

     public function get_employee_data(Request $request){

        $emp = new Employee();
        $emp->company_id = $request->input('company_id');
        $emp->first_name = $request->input('first_name');
        $emp->last_name = $request->input('last_name');
        $emp->email = $request->input('email');
        $emp->phone = $request->input('phone');
        if($emp->save()){
            return "success";
        }else{
            return "error";
        }

       
     }

     public function delete_employee_data(Request $request){
        $del_emp = Employee::find($request->id);
        //$del_emp->company_ids = '';
        //$del_emp->first_name = '';
       //$del_emp->last_name = '';
        //$del_emp->email = '';
        //$del_emp->phone = '';
        $del_emp->delete();
     }

     public function delete_company_data(Request $request){
        $del_comp = Company::find($request->id);
        $del_comp->delete();
    }
}
