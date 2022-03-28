<?php

namespace App\Http\Controllers;

use App\Models\Employer_Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployeeAccountController extends Controller
{
    public function ShowLogin(){
        return view('login');
    }

    public function Login(Request $request){
        $credentials = $request->only(['email','password']);
        if(Auth::guard('employee')->attempt($credentials)){
            //return dd(Auth::guard('employer')->user()->getAttributes());
            return redirect(route('employee.home'));
        }else{
            return redirect()->back()->withErrors('email or password is incorrect');
        }
    }
}
