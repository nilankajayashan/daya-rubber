<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    public function adminRegisterView(){
        $employees = Employee::all();
        if(count($employees) <= 0){
            return view('admin_register');
        }else{
            session()->forget('auth_employee');
            return view('login',['no_employees' => false]);
        }
    }

    public function adminRegisterSubmit(Request $request){
        $validator = validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:32|min:8',
        ]);
        if ($validator->fails()){
            if($validator->errors()->has('name')){
                return redirect()->route('register')->withErrors( ['name' => 'Please Check your name again']);
            }elseif($validator->errors()->has('email')){
                return redirect()->route('register')->withErrors( ['email' => 'Please Check you entered Email again']);
            }elseif($validator->errors()->has('password')){
                return redirect()->route('register')->withErrors( ['password' => 'Please Check you entered password again']);
            }
        }
        $validated = $validator->validated();
        $exists = Employee::all();
        if (count($exists)>0){
            return view('login',['no_employees' => false])->with(['notify_error' => 'Employeer account already exists! please try to login']);
        }
        try{
            $employeer = new Employee();
            $employeer->name = $validated['name'];
            $employeer->email = $validated['email'];
            $employeer->mobile = $request->mobile;
            $employeer->status = 1;
            $employeer->approved_by =  $validated['email'];
            $employeer->added_by =  $validated['email'];
            $employeer->permissions =  'all';
            $employeer->password = Hash::make( $validated['password']);
            $permissions = ["dashboard","view-category","edit-category","add-category","delete-category","approve-category","view-product","edit-product","add-product","delete-product","approve-product","view-order","edit-order","add-order","delete-order","manage-order","view-customer","edit-customer","add-customer","delete-customer","view-employee","edit-employee","add-employee","delete-employee","approve-employee","view-supplier","edit-supplier","add-supplier","delete-supplier","approve-supplier"];
            $employeer->permissions = json_encode($permissions);
            $employeer->save();
            return redirect()->route('login')->with([
                'success' => 'Dear '.$validated['name'].', Thank you for use YOWO POS...! your account created successfully... Now You can login as ADMINISTRATOR using you entered email and password'
            ]);
        }catch (Exception $e){
            return redirect()->back()->with(['notify_error' => $e->getMessage()]);
        }


    }
}
