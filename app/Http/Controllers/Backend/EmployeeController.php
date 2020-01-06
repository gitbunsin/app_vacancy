<?php

namespace App\Http\Controllers\Backend;

use App\Model\Employee;
use App\Model\EmployeeAttachment;
use App\Model\EmployeeEmergencyContacts;
use App\Model\role;
use App\userEmployee;
use App\Model\employee_reporting_to;
use App\Model\ReportingMethod;
use App\Model\payPeriod;
use App\Model\EmployeeBasicSalary;
use App\Model\employeeLanguage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Model\jobTitle;
use App\Model\employeeLicense;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::with('jobTitle')->get();
        // dd($employee);
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
                $employee->photo = Null;
            }
            //$employee->admin_id = $employee->admin()->associate(auth()->guard('admin')->user()->id);
            $employee->save();
            $id = $employee->id;

        }
        return redirect('admin/employee/' . $id . '/edit');
    }

    //Reporting To 
    public function addSupervisor(Request $request)
    {
        $reporting = new employee_reporting_to();
        $reporting->employee_id = $request->Supervisor_id;
        $reporting->reporting_id = $request->reporting_method_id;
        $reporting->save();
        $reporting['reporting_method'] = ReportingMethod::find($request->reporting_method_id);
        $reporting['supervisor'] = employee::find($request->Supervisor_id);
        return response()->json($reporting);
    }
    public function deleteSupervisor($id)
    {
        $reporting = employee_reporting_to::find($id);
        $reporting->delete();
        return response()->json($reporting);
    }

    function editSupervisor($id)
    {
        $reporting = employee_reporting_to::find($id);
        $reporting['reporting_method'] = ReportingMethod::find($reporting->reporting_id);
        $reporting['supervisor'] = employee::find($reporting->employee_id);
        $reporting['all_reporting_method'] = ReportingMethod::all();
        $reporting['all_supervisor'] = employee::all();
        return response()->json($reporting);
    }

    public function updateSupervisor(Request $request , $id)
    {
        $reporting = employee_reporting_to::find($id);
        $reporting->employee_id = $request->Supervisor_id;
        $reporting->reporting_id = $request->reporting_method_id;
        $reporting->save();
        $reporting['reporting_method'] = ReportingMethod::find($request->reporting_method_id);
        $reporting['supervisor'] = employee::find($request->Supervisor_id);
        return response()->json($reporting);
    }

    public function updateEmployeeDocument(Request $request , $id)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $attachment = new EmployeeAttachment();
        $attachment->admin_id = auth()->guard('admin')->user()->id;
        $attachment->employee_id = $id;
        $attachment->file_name = $filename ;
        $attachment->attachment_type = $request->file('file')->getMimeType();
        $attachment->file_size =  $request->file('file')->getSize();
        $attachment->file_type = $request->file('file')->getType();
        $attachment->file_content = $request->file('file')->getPathname();
        $attachment->attached_by_name =  auth()->guard('admin')->user()->name;
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
        $attachment->save();
        return response()->json($attachment);
    }


    public function updateEmployeeJobDetails(Request $request , $id)
    {
        $employee_job= employee::findorFail($id);
        $employee_job->job_title_id = $request->job_title_id;
        $employee_job->emp_status = $request->status_id;
        $employee_job->job_category_id = $request->category_id;
        $employee_job->joined_date =  $request->join_date;
        $employee_job->location_id =  $request->location_id;
        $employee_job->save();
        return response()->json($employee_job);
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
     // Emergency Contact
     public function addEmergencyContact()
     {
         $EmergencyContact = new EmployeeEmergencyContacts();
         $EmergencyContact->admin_id = auth()->guard('admin')->user()->id;
         $EmergencyContact->employee()->associate(input::get("id"));
         $EmergencyContact->name = input::get('name');
         $EmergencyContact->relationship = input::get('relationship');
         $EmergencyContact->work_telephone = input::get('work_telephone');
         $EmergencyContact->home_telephone = input::get('home_telephone');
         $EmergencyContact->mobile = input::get('mobile');
         $EmergencyContact->save();
         return response()->json($EmergencyContact);
 
     }

     public function showEmergencyContact($id)
     {
         $contact =  EmployeeEmergencyContacts::find($id);
         return response()->json($contact);
     }
 
     public function updateEmergencyContact($id)
     {
 
         $Contact = EmployeeEmergencyContacts::findorFail($id);
         $Contact->admin_id = auth()->guard('admin')->user()->id;
         $Contact->employee()->associate(input::get("employee_id"));
         $Contact->name = input::get('name');
         $Contact->relationship = input::get('relationship');
         $Contact->work_telephone = input::get('work_telephone');
         $Contact->home_telephone = input::get('home_telephone');
         $Contact->mobile = input::get('mobile');
         $Contact->save();
         return response()->json($Contact);
 
     }

     public function updateEmployeeDetails($id)
     {
         $employee = Employee::find($id);
         $employee->first_name = input::get('first_name');
         $employee->last_name = input::get('last_name');
         $employee->middle_name = input::get('middle_name');
         $employee->gender = input::get('gender');
         $employee->marital_status = input::get('marital_status');
         $employee->other_id = input::get('other_id');
         $employee->birthday = input::get('birthday_id');
         $employee->nationality_id = input::get('nationality_id');
         $employee->save();
         return response()->json($employee);
     }
 
     public function updateContactEmployeeDetails($id)
     {
 
         $employee_contact = Employee::find($id);
         $employee_contact->street1 = input::get('street1');
         $employee_contact->street2 = input::get('street2');
         $employee_contact->city_code = input::get('city_code');
         $employee_contact->country_code = input::get('country_code');
         $employee_contact->province_code = input::get('province_code');
         $employee_contact->zip_code = input::get('zip_code');
         $employee_contact->telephone = input::get('telephone');
         $employee_contact->mobile = input::get('mobile');
         $employee_contact->work_telephone = input::get('work_telephone');
         $employee_contact->work_email = input::get('work_email');
         $employee_contact->other_email = input::get('other_email');
         $employee_contact->save();
         return response()->json($employee_contact);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function deleteEmergencyContact($id)
     {
         $data = EmployeeEmergencyContacts::find($id);
         $data->delete();
         return response()->json($data);
     }

     public function deleteEmployeeDocument($id)
     {
        $data = employeeAttachment::find($id);
        $data->delete();
        return response()->json($data);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with(['supervisor','admin','terminate','employeeMembership','employeeLicense','employeeLanguage','employeeSkill','employeeEducation','workexperience','salary','emergencyContact','attachment'])->where('id',$id)->first();
        $basicSalary = EmployeeBasicSalary::with(['payPeriod','currency'])->where('employee_id',$employee->id)->first();

        // dd($employee);
        // $basicPayPeriod = payPeriod::where('id',$basicSalary->payperiod_id)->first();
        return view('backend/pages/employee/edit',compact('employee','basicSalary'));
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
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json("success");
    }
}
