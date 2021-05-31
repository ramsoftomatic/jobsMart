<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
 
use Auth, Validator, Input, Redirect,Session; 

class StaffController extends Controller
{
     public function staff_index()
    {
       try{
        
        $clients=DB::table('company')->select('company_id','company_name')->get();
        return view('add_staff',compact('clients'));
        }
        catch(QueryException $e)
        {
            
            return redirect()->back()->with('failure',"Database Query Error! [ ".$e->getMessage()." ]");
        }
        catch(Exception $e)
        {
            
            return redirect()->back()->with('failure',$q->getMessage());
        }
    }

    public function add_staff(Request $request) {
        try {  
             if (session('username') == '') {               
                    return redirect('/')->with('failure', 'Please Login First');
                }
               
            
                // $rules=array(             
                //     'name'=>'required|string',
                //     'mobile'=>'required|numeric',
                //     'address'=>'required|string',
                //     'location'=>'required|string',
                //     'joining_date'=>'required|string',
                //     'salary'=>'required|string',
                //     'email'=>'required|string',
                //     'password'=>'required|string',
                //     'clients'=>'required|numeric',
                //    );
                // $validator = Validator::make(Input::all(),$rules);
                // if($validator->fails())
                // {
                //     return redirect()->back()
                //     ->withErrors($validator)
                //     ->withInput($request->all)
                //     ->with('alert-danger','Validation Error');
                // }
               
                $name = $request->name;
                $mobile  = $request->mobile;
                $address = $request->address;
                $location = $request->location;
                $joining_date = $request->date;
                $salary = $request->salary;
                $email = $request->email;
                $password = bcrypt($request->password);
                $clients = $request->clients;
                $role_id = 2;
                $status='Active';
                 
                $email_match=DB::table('users')->select('email')->get();

                foreach($email_match as $email_mat)
                {
                    $email_mat_arr[]= $email_mat->email;
                }
// 
                if (in_array($email, $email_mat_arr))
                {
                    Log::info('Email Id is already Exist');
                    return redirect()->back()->with('failure','Email Id is already Exist');
                }
                                           
                log::info($email_mat_arr);
                log::info($email);

            //staff
             $staff_id=DB::table('staff')->insertGetId([
                'name' => $name,
                'mobile' => $mobile,
                'email'=>$email,
                'address' => $address,
                'location' => $location,
                'joining_date' => $joining_date,
                'salary' => $salary,
                 
             ]);

            //users
            $user=DB::table('users')->insert(['name'=>$name,'email'=>$email,'phone_no'=>$mobile,'password'=>$password,'role_id'=>$role_id]);
            
            //staff client
            for($i=0;$i<sizeof($clients);$i++){
            $staff_client=DB::table('staff_clients')->insert(['staff_id'=>$staff_id,'client_id'=>$clients[$i],'status'=>$status]);
            }
            
           
        
        Log::Info($staff_id);
        log::info($user);
        log::info($staff_client);
           if($staff_id)
            {  
                 if($user)
                {
                      return redirect()->back()->with('success','Staff Added Successfully');
                }
                else
                {
                     return redirect()->back()->with('success','Staff Cant not be Added');
                }
            }
            else
            {                              
                return redirect()->back()->with('danger','Staff can not be Added')->withInput($request->all);
            }
           
        } 
        catch(QueryException $e)
         {
                    Log::error($e->getMessage());
                    return redirect()->back()->with('danger','something went wrong. try again later')->withInput($request->all);
         }
         catch(Exception $e)
         {
                    Log::error($e->getMessage());
                    return redirect()->back()->with('danger','something went wrong. try again later')->withInput($request->all);
          }     
        
    }
    public function staff_list(Request $request)
    {
        try{
        
       
        $staff=DB::table('staff')->get();
       
            
        for($i=0;$i<sizeof($staff);$i++){   
            $staff_clients=DB::table('staff_clients')
            ->join('company','staff_clients.client_id','=','company.company_id')
            ->select('company.company_name')
            ->where('staff_clients.staff_id',$staff[$i]->id)
            ->get();
               
            $company='';

            for($j=0;$j<sizeof($staff_clients);$j++){
                if($j>0)
                    $company.=", ";
                $company.=$staff_clients[$j]->company_name;
                }

            $staff[$i]->company=$company;
            log::info($staff);
            log::info($staff_clients);
             
            }
            return view('staff_list', ['staff' => $staff]);

            
         
         
        }
        catch(QueryException $e)
        {
            
            return redirect()->back()->with('failure',"Database Query Error! [ ".$e->getMessage()." ]")->withInput($request->all);
        }
        catch(Exception $e)
        {
            
            return redirect()->back()->with('failure',$q->getMessage())->withInput($request->all);
        }

    }
    
}
