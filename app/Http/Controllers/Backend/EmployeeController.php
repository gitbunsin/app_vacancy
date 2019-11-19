<?php

namespace App\Http\Controllers\Backend;

use App\Model\Employee;
use App\Model\EmployeeAttachment;
use App\Model\EmployeeEmergencyContacts;
use App\Model\role;
use App\userEmployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('backend/pages/employee/index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('backend/pages/employee/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/employee/');
            $getMimeType = $image->getMimeType();
            $image->move($destinationPath, $name);
        }
        $login = $request->username;
        if($login){
            //dd('has login');
            $data = $request->except(['username','password','confirm_password','email']);
            $employee = Employee::create($data);
            $employee->save();
            $id = $employee->id;
            $userEmployee = new userEmployee();
            $userEmployee->username = $request->username;
            $userEmployee->password = Hash::make($request->password);
            $userEmployee->email = $request->email;
            $userEmployee->email_token = base64_encode($request->email);
            $userEmployee->verified = 1;
            $userEmployee->admin()->associate(auth()->guard('admin')->user()->id);
            $userEmployee->role()->associate(2);
            $userEmployee->employee()->associate($id);
            $userEmployee->save();


        }else{

            // dd('has not login');
            $data = $request->except(['username','password','confirm_password','email']);
            $employee = Employee::create($data);
            if ($request->file('photo')) {

                $employee->photo = $name;
            }else{
                $employee->photo = " ";
            }
            //$employee->admin_id = $employee->admin()->associate(auth()->guard('admin')->user()->id);
            $employee->save();
            $id = $employee->id;

        }
        return redirect('admin/employee/' . $id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with(['emergencyContact','attachment'])->where('id',$id)->first();

        //dd($employee->attachment);
        return view('backend/pages/employee/edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
