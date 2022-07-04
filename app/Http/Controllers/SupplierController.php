<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function add(Request $request){
        $permissions = Employee::where('employee_id', '=', session()->get('auth_employee')->employee_id)->first();
        $permissions = $permissions->permissions;
        if (!in_array( 'add-supplier', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission to add supplier']);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'company' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('name')){
                return redirect()->back()->with(['notify_error' => 'supplier Name is Required'])->withErrors(['name' => 'supplier Name Required']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email Address is Required'])->withErrors(['email' => 'Email Address is Required']);
            }
            if ($validator->errors()->has('company')){
                return redirect()->back()->with(['notify_error' => 'Company is Required'])->withErrors(['company' => 'Company is Required']);
            }
        }
        $validated = $validator->validated();
        try {
            $exist_supplier = Supplier::where('email', '=', $validated['email'])->first();
            if ($exist_supplier != null){
                return redirect()->back()->with(['notify_error' => 'Email Address Already Registered'])->withErrors(['email' => 'Your Email Already have account, please try login now']);
            }
            $supplier = new Supplier();
            $supplier->name = $validated['name'];
            $supplier->email = $validated['email'];
            $supplier->mobile = isset($request->mobile)?$request->mobile:null;
            $supplier->company = $validated['company'];
            $supplier->save();
            return redirect()->back()->with(['success' => 'Supplier Added Successfully']);
        }catch (Exception $exception){
            return redirect()->back()->with(['error' => 'Something Went Wrong'.$exception->getMessage()]);
        }
    }
    public function edit(Request $request){
        $permissions = Employee::where('employee_id', '=', session()->get('auth_employee')->employee_id)->first();
        $permissions = $permissions->permissions;
        if (!in_array( 'edit-supplier', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission to edit supplier']);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'supplier_id' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('name')){
                return redirect()->back()->with(['notify_error' => 'supplier Name is Required'])->withErrors(['name' => 'supplier Name Required']);
            }
            if ($validator->errors()->has('email')){
                return redirect()->back()->with(['notify_error' => 'Email Address is Required']);
            }
            if ($validator->errors()->has('supplier_id')){
                return redirect()->back()->with(['notify_error' => 'Supplier ID is Required']);
            }
        }
        $validated = $validator->validated();
        try {
            $supplier = Supplier::where('supplier_id', '=', $validated['supplier_id'])->first();
            if ($supplier == null){
                return redirect()->back()->with(['notify_error' => 'Can not find supplier Account']);
            }
            $supplier->name = $validated['name'];
            $supplier->mobile = isset($request->mobile)?$request->mobile:null;
            $supplier->company = isset($request->company)?$request->company:null;
            $supplier->save();
            return redirect()->back()->with(['success' => 'Supplier Updated Successfully']);
        }catch (Exception $exception){
            return redirect()->back()->with(['error' => 'Something Went Wrong'.$exception->getMessage()]);
        }
    }
    public function delete(Request $request){
        $permissions = Employee::where('employee_id', '=', session()->get('auth_employee')->employee_id)->first();
        $permissions = $permissions->permissions;
        if (!in_array( 'delete-supplier', json_decode($permissions))){
            return redirect()->back()->with(['notify_warning' => 'You have not permission to delete supplier']);
        }

        $validator = Validator::make($request->all(),[
            'supplier_id' => 'required',
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('supplier_id')){
                return redirect()->back()->with(['notify_error' => 'Supplier ID is Required to delete supplier']);
            }
        }
        $validated = $validator->validated();
        try {
            $supplier = Supplier::where('supplier_id', '=', $validated['supplier_id'])->first();
            if ($supplier == null){
                return redirect()->back()->with(['notify_error' => 'Can not identify supplier']);
            }
            $supplier->delete();
            return redirect()->back()->with(['success' => 'supplier Deleted Successfully']);
        }catch (Exception $exception){
            return redirect()->back()->with(['error' => 'Something Went Wrong'.$exception->getMessage()]);
        }
    }
}
