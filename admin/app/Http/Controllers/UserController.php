<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\databasequery;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use databasequery;
    public function user()
    {        
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
            $company = DB::table('company')->get();
            return view('add_user',compact('company'));
        }
        catch(QueryException $e)
        {
            Log::error('CompanyController->user : '.$e->getMessage());
            return redirect()->back()->with('failure',$e->getMessage());
        }
        catch(Exception $e)
        {
            Log::error('CompanyController->user : '.$e->getMessage());
            return redirect()->back()->with('failure',$e->getMessage());
        }

    }

    /////////////Back end pending in Add user//////////////////////////////////
    public function add_user(Request $request)
    {        
        try{           
            
            if(session('username') == '')
            {
                return redirect('/')->with('failure','Please Login First');
            }
             ////////////////01/08/2019/////////////////////////
             $rules=array(
                'user_type' => 'required|string',
                'name' => 'required|array',
                'phone_no' => 'required|array',
                'email' => 'required|array',
                'company_id' => 'required|array',             
                'id_type' => 'nullable|array',
                'id_no' => 'nullable|array',
                'joining_date' => 'nullable|array',
                'assign_company' =>'nullable|array',///////please conform from higher author            
                'address' => 'nullable|array',
                'username' => 'required|array',
                'password' => 'required|array',
               );
               $validator = Validator::make(Input::all(),$rules);
               if($validator->fails())
               {
                   return redirect()->back()
                   ->withErrors($validator)
                   ->withInput($request->all)
                   ->with('danger','Validation Error');
               }           
               /////////end 01/08/2019////////////////////////
           
            if( $request->user_type =='company') {
                // return 1;
            $inserted = 0;      
            $role_id = 3;    
            $keys = array_keys($request->name);           
            for($i=0;$i<sizeof($keys);$i++)
            { 
    		$insertuser = $this->addusers($request->company_id[$keys[$i]],$request->name[$keys[$i]],$request->email[$keys[$i]],$request->phone_no[$keys[$i]],$role_id,$request->username[$keys[$i]],$request->password[$keys[$i]]);
           
                if($insertuser!=null)
                $inserted++;
            }          
            if($i == $inserted)
            {
                return redirect()->back()->with('success','Company User Added Successfully');
            }else{
                return redirect()->back()->with('failure','Company User Not Added');
            }

            }else{                
                $insert = 0;
                $role_id = 2;
                $keys = array_keys($request->name);
                for($i=0;$i<sizeof($keys);$i++)
                { 
                    $user_id = $this->addusers(null,$request->name[$keys[$i]],$request->email[$keys[$i]],$request->phone_no[$keys[$i]],$role_id,$request->username[$keys[$i]],$request->password[$keys[$i]]);
                    $employee_id = $this->add_employee($user_id,$request->id_type[$keys[$i]],$request->id_no[$keys[$i]],$request->address[$keys[$i]],$request->joining_date[$keys[$i]]);
                     //return $request->assign_company;
                    if($request->assign_company[$keys[$i]]!=null || $request->assign_company[$keys[$i]]!='')
                    {
                    $key = array_keys($request->assign_company[$keys[$i]]);                    
                 
                    for($j=0; $j<sizeof($key);$j++){                        
                        $assign_company = $this->assigncompany($user_id,$request->assign_company[$keys[$i]][$key[$j]]);                        
                    }
                }
                    
                    if($user_id!=null && $employee_id!=null)
                   
                     $insert++;                     
                }
              
                if($i == $insert)
                {
                    return redirect()->back()->with('success','Employee Added Successfully');
                }else{
                    return redirect()->back()->with('failure','Employee Not Added');
                }

            }            
           
            
           
        }
        catch(QueryException $e)
        {
            Log::error('UserController->add_user: '.$e->getMessage());
            return redirect()->back()->with('failure',$e->getMessage());
        }
        catch(Exception $e)
        {
            Log::error('UserController->add_user : '.$e->getMessage());
            return redirect()->back()->with('failure',$e->getMessage());
        }

    }


    public function get_assign_company()
    {
        try{
            if(session('username')=='')
            {
                return redirect('/')->with('failure','Please Login First');
            }
            $users = DB::table('employee')->rightjoin('users','users.id','=','employee.user_id')->select('employee.user_id','users.name')->get();
            return view('assign_company',compact('users'));
        }
        catch(QueryException $e)
        {
          Log::error('UserController->get_assign_company : '.$e->getMessage());
          return redirect()->back()->with('failure',$e->getMessage());
            
        }
        catch(Exception $e)
        {
            Log::error('UserController->get_assign_company : '.$e->getMessage());
            return redirect()->back()->with('failure',$e->getMessage());

        }
       
    }
    public function assign_company(Request $request)
    {
        try{
            if(session('username')=='')
            {
                return redirect('/')->with('failure','Please Login First');
            }
            $rules=array(
    			'user'=>'required|string',
    			'company'=>'required|array'
    		);
    		$validator = Validator::make(Input::all(),$rules);
    		if($validator->fails())
    		{
    			return redirect()->back()
    			->withErrors($validator)
                ->withInput($request->all)
                ->with('danger','Validation Error');
            }           
           
            $inserted=0;
            for($i=0; $i<sizeof($request->company); $i++)
            {
                  $insert = DB::table('emp_company_map')->insert([
                    'user_id' => $request->user,
                    'company_id' => $request->company[$i]
                ]);
               
                if($insert)
                   $inserted++;
                  
            }
            if($inserted==sizeof($request->company))
    		{
    			return redirect()->back()->with('success','Company Assigned Successfully');
    		}
    		else
    		{
    			return redirect()->back()->with('danger','Company Assign Process Failed');
            }
            //return 1;
    		return view('assign_company',compact('users','comapny'));
        }
        catch(QueryException $e)
        {
          Log::error('UserController->assign_company : '.$e->getMessage());
          return redirect()->back()->with('failure',$e->getMessage());
            
        }
        catch(Exception $e)
        {
            Log::error('UserController->assign_company : '.$e->getMessage());
            return redirect()->back()->with('failure',$e->getMessage());

        }
       
    }
    

    public function get_not_assigned_company(Request $request)
    {
        try{    
                      
            $output='';
            $company_array=array();
            $company = DB::table('emp_company_map')->select('company_id')->where('user_id',$request->id)->get();

            for($i=0;$i<sizeof($company);$i++)
            {
                array_push($company_array,$company[$i]->company_id);
            }
            $company_array;
            $company = DB::table('company')->whereNotIn('company_id',$company_array)->get();

            for($i=0;$i<sizeof($company);$i++)
            {
                $output.='<option value="'.$company[$i]->company_id.'">'.$company[$i]->company_name.'</option>';
            }
            return $output;    

       
        }


        catch(QueryException $e)
        {
          Log::error('UserController->get_not_assigned_company : '.$e->getMessage());
          return redirect()->back()->with('failure',$e->getMessage());
            
        }
        catch(Exception $e)
        {
            Log::error('UserController->get_not_assigned_company : '.$e->getMessage());
            return redirect()->back()->with('failure',$e->getMessage());

        }
    }

}




// $rules = array(
    		// 	'user_type' => 'required|string',
    		// 	'name' => 'required|array',
    		// 	'email' => 'required|array',
    		// 	'phone_no' => 'required|array',
    		// 	'client' => 'nullable|array',
    		// 	'id_no' => 'nullable|array',
    		// 	'joining_date' => 'nullable|array',
    		// 	'role' => 'nullable|array',
    		// 	'address' => 'nullable|array',
    		// 	'username' => 'required|array',
    		// 	'password' => 'required|array',    			
    		// );
    		// $validator = Validator::make(Input::all(),$rules);
    		// if($validator->fails()){
    		// 	return redirect()->back()
    		// 	->withErrors($validator)
            //     ->withInput($request->all)
            //     ->with('danger','Validation Error');
            // }

            // Log::info($request);
            // //return 2;            
            // $keys = array_keys($request->user_name); //contact person keys value         
            // //return 3;
            // $inserted=0;
            // Log::info('starting for loop');
            // for($i=0;$i<sizeof($request->user_name);$i++) //to check keys peresent or not $request->company_id,
            // {   //return 5;            
            //     Log::info('inside for loop '.$i);
            //     $insertusers = $this->addusers($request->company_id,$request->user_name,$request->user_email,$request->user_phone,$request->username,$request->password);          
            //     //return $insertcontacts;
            //     return 6; 
            //     if($insertusers)
            //     $inserted++;
            //     Log::info($insertusers);  
            //     return 7;
            // } 
            // if($inserted == $i  )
            // {
            //     return 'success';
            // }else{
            //     return 'failure';
            // }