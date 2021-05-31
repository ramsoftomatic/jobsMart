<?php

namespace App\Http\Controllers;

use App\Traits\databasequery;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Auth, Validator, Input, Redirect,Session;
use Illuminate\Auth\Events\Failed;
use Carbon\Carbon;
class CompanyController extends Controller
{
    use databasequery;

    public function company(Request $request)
    {
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
        
            $states = DB::table('state')->get();
            $placement_policy = DB::table('placement_policy')->get(); 
            $action="save_company_detail";
            $company_detail="";
            return view('add_company', compact('states', 'placement_policy','action','company_detail'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    } 
    public function company_contact_index($data)
    {
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            } 
            $company_detail=DB::table('company')->where('company_id',$data)
            ->get();
           
            $office_count=DB::table('contact_person_detail')->where('company_id',$data)->where('contact_type','office')->count();
            $branch_count=DB::table('contact_person_detail')->where('company_id',$data)->where('contact_type','branch')->count();
            $contact_person_office=DB::table('contact_person_detail')->where('company_id',$data)->where('contact_type','office')->get();
            $contact_person_branch=DB::table('contact_person_detail')->where('company_id',$data)->where('contact_type','branch')->get();
            $id = $data;
            $cities=DB::table('city')->get();
            $msg='Company registered Successfully';
            $success='success';
            $states = DB::table('state')->get();
            $msg1 = "Something went wrong";
            $company_id=$data;
         return view('company_contact',compact('company_id','msg','id','success','states','company_detail','cities','contact_person_office','contact_person_branch','office_count','branch_count'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }       
    public function company_payment_index($data)
    {

        try
        {
            log::info('comapnay payment page for company id='.$data);
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
             $id = $data;
             $success='success';
             $msg = "company Contact Detail Saved Successfully";
             $company_detail=DB::table('company')->where('company_id',$data)
             ->get();
            $company_id=$data;
          return view('company_payment',compact('msg','id','success','company_detail','company_id'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }  
    public function terms_and_conditions_index($data)
    {

        try
        {
            log::info('terms and conditions for company id='.$data);
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
             $id = $data;
             $success='success';
             $msg = "company payment Detail Saved Successfully";
             $company_detail=DB::table('company')->where('company_id',$data)
             ->get();
            $company_id=$data;
          return view('terms_and_conditions',compact('msg','id','success','company_detail','company_id'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }  
    public function update_company_index($company_id)
    {
        
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
            $states = DB::table('state')->get();
            $cities = DB::table('city')->get();
            $company_detail = DB::table('company')->where('company_id',$company_id)->get();
            $action="update_company";
            return view('add_company', compact('company_detail','states','cities','action','company_id'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }    
    public function get_city(Request $request)
    {
        try {

            $output = '';
            $cities = DB::table('city')->where('state_id', $request->id)->get();
            $output .= '<option value=""></option>';
            foreach ($cities as $city) {
                $output .= '<option value="' . $city->city_id . '">' . $city->city_name . '</option>';
            }

            return $output;
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    public function add_city(Request $request)
    {
        try {
            $state= $request->state;
            $city= $request->city;
            $output = '';
            $insert = DB::table('city')->insert([
                'city_name'=>$city,
                'state_id'=>$state
            ]);
            if($insert)
            {
                
    
                return "success";
            }
            else
            {
                return "error";
            }
          
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }
    }
  
    public function get_prev_addr(Request $request)
    {
        try {

           $company_id=$request->company_id;
          $detail=DB::table('company')->select('company_address1','company_address2','company_state','company_city','company_pincode')->where('company_id',$company_id)->get();
       
           $office_address1=$detail[0]->company_address1;
           $office_address2=$detail[0]->company_address2;
           $office_state=$detail[0]->company_state;
           $city_id=$detail[0]->company_city;
           $city_name=DB::table('city')->where('city_id',$city_id)->value('city_name');
           $office_city='<option val='.$city_id.'>'.$city_name.'</option>';
           $office_pincode=$detail[0]->company_pincode;
            return json_encode(['office_address1'=>$office_address1,'office_address2'=>$office_address2,'office_state'=>$office_state,'office_city'=>$office_city,'office_pincode'=>$office_pincode]);
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }
    }
    public function update_company(Request $request)
    {
        if(session('username') != '')
        {
            try
            {
                $rules=array(             
                    'company_name'=>'required|string',
                    'company_contact_no'=>'required|numeric',
                  );
                $validator = Validator::make(Input::all(),$rules);
                if($validator->fails())
                { 
                    return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all)
                    ->with('alert-danger','Validation Error');
                }
                $company_id=$request->company_id;
                $company_name = $request->company_name;
                $company_contact_no  = $request->company_contact_no;
                $company_email = $request->company_email;
                $company_web = $request->company_web;
                $industry = $request->industry;
                $company_type = $request->company_type;
                $employee_no = $request->employee_no;
                $turnover = $request->turnover;
                $establish_year = $request->establish_year;
                $products_of_co = $request->products_of_co;
                $owner_name = $request->owner_name;
                $owner_email = $request->owner_email;
                $owner_phone = $request->owner_phone;
                $company_address1 = $request->company_address1;
                $company_address2 = $request->company_address2;
                $company_state = $request->company_state;
                $company_city = $request->company_city;
                $company_pincode = $request->company_pincode;
              $update=DB::table('company')->where('company_id',$company_id)->update([
                'company_name' => $company_name,
                'company_contact_no' => $company_contact_no,
                'company_email' => $company_email,
                'company_web' => $company_web,
                'industry' => $industry,
                'company_type' => $company_type,
                'employee_no' => $employee_no,
                'turnover' => $turnover,
                'establish_year' => $establish_year,
                'products_of_co' => $products_of_co,
                'owner_name' => $owner_name,
                'owner_email' => $owner_email,
                'owner_phone' => $owner_phone,
                'company_address1' => $company_address1,
                'company_address2' => $company_address2,
                'company_state' => $company_state ,
                'company_city' => $company_city ,
                'company_pincode' => $company_pincode ,
                'updated_at'=>carbon::now()
              ]) ; 
                
            if($update)
            {

                return Redirect::route('company_contact',$company_id);
               
            }
            else{
                $msg='company detail can`t be updated';
                return redirect()->back()->with('failure','msg');
                 Log::info('company detail can`t be updated');
            }
            
            
                
            
            
            } catch (QueryException $e) {
                Log::error('CompanyController : ' . $e->getMessage());
                return 'failure';
            } catch (Exception $e) {
                Log::error('CompanyController : ' . $e->getMessage());
                return 'failure';
            }
        }
        else
        {
            return redirect('/')->with('failure','Please Login First');
        }
    }
    
    public function create_user(Request $request)
    {
        try
        { 
            ///////////02/08/2019////////////////////////////
            if(session('username') == '')
            {
                return redirect('/')->with('failure','Please Login First');
            }
                   
            $inserted = 0;
            $role_id = 3;
            
            $keys = array_keys($request->username);
            
            for($i=0;$i<sizeof($keys);$i++)
            {

                $user_id = $this->addusers($request->company_id,$request->user_name[$keys[$i]], $request->user_email[$keys[$i]], $request->user_phone[$keys[$i]],$role_id,$request->username[$keys[$i]], $request->password[$keys[$i]]);
                
                if($user_id!=null)               
                    $inserted++;
            }
            
            if($i == $inserted )
            { 
                return redirect()->back()->with('success','Company add process completed successfully');
            }
            else
            {
                return redirect()->back()->with('failure','User add process Failed! Try again later.');
            }

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', 'Something went wrong. Try again later.');
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', 'Something went wrong. Try again later.');
        }        
        
    }
//new changes//
     public function view_company()
    {
        if(Session::has('username'))
        {
            $comapny_records = DB::table('company')
                              ->leftjoin('vecancy','company.company_id','vecancy.company_id','outer join')
                              ->select('company.*','vecancy.position','vecancy.experience','vecancy.vecancy_status','vecancy.salary','vecancy.comp_location')
                              ->orderBy('company.company_id','ASC')
                              ->get();
            return view('companylist', ['comapny_records' => $comapny_records]);
        }
        else
            return Redirect::to('/');
    }
    
    public function save_company_detail(Request $request) {
        try {  
                if (session('username') == '') {               
                    return redirect('/')->with('failure', 'Please Login First');
                }
            
                $rules=array(             
                    'company_name'=>'required|string',
                    'company_contact_no'=>'required|numeric',
                  );
                $validator = Validator::make(Input::all(),$rules);
                if($validator->fails())
                { 
                    return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all)
                    ->with('alert-danger','Validation Error');
                }
           
                $company_name = $request->company_name;
                $company_contact_no  = $request->company_contact_no;
                $company_email = $request->company_email;
                $company_web = $request->company_web;
                $industry = $request->industry;
                $company_type = $request->company_type;
                $employee_no = $request->employee_no;
                $turnover = $request->turnover;
                $establish_year = $request->establish_year;
                $products_of_co = $request->products_of_co;
                $owner_name = $request->owner_name;
                $owner_email = $request->owner_email;
                $owner_phone = $request->owner_phone;
                $company_address1 = $request->company_address1;
                $company_address2 = $request->company_address2;
                $company_state = $request->company_state;
                $company_city = $request->company_city;
                $company_pincode = $request->company_pincode;
                    
         $insert=DB::table('company')->insert([
            'company_name' => $company_name,
            'company_contact_no' => $company_contact_no,
            'company_email' => $company_email,
            'company_web' => $company_web,
            'industry' => $industry,
            'company_type' => $company_type,
            'employee_no' => $employee_no,
            'turnover' => $turnover,
            'establish_year' => $establish_year,
            'products_of_co' => $products_of_co,
            'owner_name' => $owner_name,
            'owner_email' => $owner_email,
            'owner_phone' => $owner_phone,
            'company_address1' => $company_address1,
            'company_address2' => $company_address2,
            'company_state' => $company_state ,
            'company_city' => $company_city ,
            'company_pincode' => $company_pincode ,
         ]);
           if($insert)
           {
             
               $id = DB::getPdo()->lastInsertId();
             
             
               Log::info('company detail insert successfully');
           
            return Redirect::route('company_contact',$id);
               
           }
           else{
               $msg='company detail can`t be inserted';
               return redirect()->back()->with('failure','msg');
                Log::info('company detail can`t be inserted');
           }
           
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage())->withInput($request->all);
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage())->withInput($request->all);
        }        
        
    }
    public function save_contact_detail(Request $request) {
        try {  
                if (session('username') == '') {               
                    return redirect('/')->with('failure', 'Please Login First');
                }
                Log::info('contact');
                $office_count=$request->office_count;
                $branch_count=$request->branch_count;
                $ofc_contact_id=$request->ofc_contact_id;
                $brn_contact_id=$request->brn_contact_id;
                $company_id=$request->company_id;
                $office_contact_person_name  = $request->office_contact_person_name ;
                $office_contact_person_post  = $request->office_contact_person_post ;
                $office_address1 = $request->office_address1;
                $office_address2 = $request->office_address2;
                $office_state = $request->office_state;
                $office_city = $request->office_city;
                $office_pincode = $request->office_pincode;
                $office_contact_person_phone = $request->office_contact_person_phone;
                 $office_contact_person_email = $request->office_contact_person_email;
               
              $branch_contact_person_name  = $request->branch_contact_person_name ;
                $branch_contact_person_post  = $request->branch_contact_person_post ;
                $branch_address1 = $request->branch_address1;
                $branch_address2 = $request->branch_address2;
                $branch_state = $request->branch_state;
                $branch_city = $request->branch_city;
                $branch_pincode = $request->branch_pincode;
                $branch_contact_person_phone = $request->branch_contact_person_phone;
                $branch_contact_person_email = $request->branch_contact_person_email;
       $update_company=DB::table('company')->where('company_id',$company_id)
           ->update([
           'office_address1'=>$office_address1,
           'office_address2'=>$office_address2,
           'office_state'=>$office_state,
           'office_city'=>$office_city,
           'office_pincode'=>$office_pincode,
           'branch_address1'=>$branch_address1,
           'branch_address2'=>$branch_address2,
           'branch_state'=>$branch_state,
           'branch_city'=>$branch_city,
           'branch_pincode'=>$branch_pincode,
           'updated_at'=>Carbon::now()
       ]);
       if($update_company)
       {
           
           log::info('Company table updated Successfully');
           if($office_contact_person_name!=[null])
           {
               
              
               
                    for($i=0;$i<sizeof($office_contact_person_name);$i++)
                    {
                        if($office_count==0 || $ofc_contact_id[$i]==0)
                        {
                        
                                $ins1=DB::table('contact_person_detail')->insert([
                                    'person_name'=>$office_contact_person_name[$i],
                                    'person_post'=>$office_contact_person_post[$i],
                                    'person_phone'=>json_encode($office_contact_person_phone[$i]),
                                    'person_email'=>json_encode($office_contact_person_email[$i]),
                                    'contact_type'=>'office',
                                    'company_id'=>$company_id
                                ]);
                        
                    
                        }
                    
                        else
                        {
                    
                        
                            
                                    $upd1=DB::table('contact_person_detail')
                                    ->where('id',$ofc_contact_id[$i])
                                    ->update([
                                        'person_name'=>$office_contact_person_name[$i],
                                        'person_post'=>$office_contact_person_post[$i],
                                        'person_phone'=>json_encode($office_contact_person_phone[$i]),
                                        'person_email'=>json_encode($office_contact_person_email[$i]),
                                        'contact_type'=>'office',
                                        'company_id'=>$company_id,
                                        'updated_at'=>carbon::now()
                                    ]);
                                    if($upd1)
                                    {
                                        Log::info('office preson detail updated successfully');
                                    }
                                    else
                                    {
                                        Log::error('office preson detail can`t be updated');
                                    }
                        
                        }
              
                } 
                   
                 
            }
            else
            {
                Log::info('contact person details are blank');
            }
      

           if($branch_contact_person_name !=[null])
           {

            log::info('Office Detail inserted Successfully');
                
                    for($j=0;$j<sizeof($branch_contact_person_name);$j++)
                        {
                            if($branch_count==0 || $brn_contact_id[$j]==0)
                            { 
                        
                                $ins2=DB::table('contact_person_detail')->insert([
                                'person_name'=>$branch_contact_person_name[$j],
                                'person_post'=>$branch_contact_person_post[$j],
                                'person_phone'=>json_encode($branch_contact_person_phone[$j]),
                                'person_email'=>json_encode($branch_contact_person_email[$j]),
                                'contact_type'=>'branch',
                                'company_id'=>$company_id
                                ]);
                            }
                            else
                            {
                                $upd2=DB::table('contact_person_detail')
                                ->where('id',$brn_contact_id[$j])
                                ->update([
                                'person_name'=>$branch_contact_person_name[$j],
                                'person_post'=>$branch_contact_person_post[$j],
                                'person_phone'=>json_encode($branch_contact_person_phone[$j]),
                                'person_email'=>json_encode($branch_contact_person_email[$j]),
                                'contact_type'=>'branch',
                                'company_id'=>$company_id,
                                'updated_at'=>carbon::now()
                                
                        ]);
                        if($upd2)
                                {
                                    Log::info('branch preson detail updated successfully');
                                }
                                else
                                {
                                    Log::error('branch preson detail can`t be updated');
                                }
                        }   
               
                  
                }
            } 
            else
            {
                Log::info('contact person branch details are blank');
            }   
             if($update_company )
             {
                $id = $company_id;
                Log::info($id." company Contact detail inserted");
                return Redirect::route('company_payment',$id);
               
            }
            else{
                $msg='company detail can`t be inserted';
                return redirect()->back()->with('failure','msg');
                 Log::info('company Contact can`t be inserted');
            }
              
           
           
          
       }
       else
       {
        $msg='company detail can`t be inserted';
        return redirect()->back()->with('failure','msg');
         Log::info('company Contact can`t be inserted');
       }             
      
           
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }        
        
    }
//---------------gst
    public function save_payment_detail(Request $request) {
        try {  
          
                if (session('username') == '') {               
                    return redirect('/')->with('failure', 'Please Login First');
                }
                

                 $company_id=$request->company_id;
                 $gst_no=$request->gst_no;
                 $charges=$request->charges ;
                 $registration=$request->registration;
                 $replacement=$request->replacement;
                 $paymenterm=$request->paymenterm;
                 $start_date=$request->start_date;
                 $end_date=$request->end_date;
                 $client_since=$request->client_since;
                 $remark=$request->remark;
                 $document=$request->documents;
                 if($request->hasFile('documents'))
                 {
                    
                    $target_dir = 'payment/';
                    $filename2 = strtolower($document->getClientOriginalName());
                    $extension = strtolower($document->getClientOriginalExtension());
                    $file_name = pathinfo($filename2, PATHINFO_FILENAME);
                    $filename2 = $file_name  . '_' . strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $target_file = $target_dir . $filename2;
                    log::info($target_file);
                    if ($document->move(base_path() .'/'. $target_dir, $filename2)) 
                    {
                        log::info('inside if condition');
                        log::info(base_path() . $target_file);
                        $attach_file = $target_file;
                    }
                }
                else
                    {   
                        $documents=DB::table('company')->where('company_id',$company_id)->value('documents');
                        $attach_file =$documents;
                    }
                

                        $update_company=DB::table('company')->where('company_id',$company_id)
                       ->update([
                       'gst_no'=>$gst_no,
                       'charges'=>$charges,
                       'registration'=>$registration,
                       'replacement'=>$replacement,
                       'paymenterm'=>$paymenterm,
                       'start_date'=>$start_date,
                       'end_date'=>$end_date,
                       'client_since'=>$client_since,
                       'remark'=>$remark,
                       'documents'=>$attach_file,
                       'updated_at'=>Carbon::now()
                         ]);

                        if($update_company)
                       {
                           log::info('Payment Details added successfully');

                                $id = $company_id;
                                Log::info($id);
                                return Redirect::route('company_user_detail',$id);   
                       }
                       else
                       {
                        $msg='Payment Details can`t be added';
                        return redirect()->back()->with('failure','msg');
                         Log::info('Payment Details can`t be added');
                       }   
                    
       
                    log::info($update_company);
                
      
           
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }        
        
    }
    //---------------gst
    public function save_user_detail(Request $request) {

        try {  
                if (session('username') == '') {               
                    return redirect('/')->with('failure', 'Please Login First');
                }
               
                
                $company_id=$request->company_id;
                 $name  = $request->user_name;
                $user_phone = $request->user_phone;
                $username = $request->username;
                $password = $request->password;
               $id=$request->id;
                $user_count=$request->user_count;
                
        Log::info($name);
          $inserted=0;
          $i=0;
          $msg="";
            for($i=0;$i<sizeof($name);$i++)
           {
            log::info("under for loop for name of user");
                    log::info(sizeof($name));
                    if($user_count>0 && $id!=0)
                    {
                        $update_user=DB::table('users')
                        ->where('id',$id[$i])
                        ->update([
                            'name'=>$name[$i],
                            'email'=>$username[$i],
                            'password'=>bcrypt($password[$i]),
                            'phone_no' => $user_phone[$i],
                            'company_id'=>$company_id,
                            'role_id'=>'3',
                            'updated_at'=>carbon::now()
                        ]);
                        if($update_user)
                        {
                            $inserted++;
                            log::info('user updated successfully');
                        }
                        else
                        {
                            $msg.=$email.', ';
                            log::info('user can`t be updated');
                        }
                        log::info($update_user);
                    }
                    else
                    {

                        $insert_user=DB::table('users')->insert([
                            'name'=>$name[$i],
                            'email'=>$username[$i],
                            'password'=>bcrypt($password[$i]),
                            'phone_no' => $user_phone[$i],
                            'company_id'=>$company_id,
                            'role_id'=>'3',
                            'created_at'=>carbon::now()
                        ]);
                        if($insert_user)
                        {
                            $inserted++;
                            log::info('user inserted successfully');
                        }
                        else
                        {
                            $msg.=$email.', ';
                            log::info('user can`t be inserted');
                        }
                        log::info($insert_user);
                    }
                    
               
        
                        
           }
            
                
                        if($inserted==$i)
                       {  

                           log::info('User table updated Successfully');

                                $id = $company_id;
                                $email=$username;
                                Log::info($id);
                                return Redirect::route('company_vecancy',$id);   
                       }
                       else
                       {
                        $msg.='User Detail can`t be added';
                        return redirect()->back()->with('failure','msg');
                         Log::info('company user can`t be added or updated');
                       }   
           
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }                
  }

  //---------------gst
    public function save_vecancy_detail(Request $request) {

        try {  
                if (session('username') == '') {               
                    return redirect('/')->with('failure', 'Please Login First');
                }   
                
                $company_id=$request->company_id;
                $position  = $request->position;
                $experience = $request->experience;
                $salary=$request->salary;
                $vecancy_status = $request->vecancy_status;
                $location = $request->location;
                $count_vecancy=$request->count_vecancy;
   
       
                    if($count_vecancy>0)
                    {
                        $id=$request->id;
                            $update_company=DB::table('vecancy')->where('id',$id)
                            ->update([
                            'position'=>$position,
                            'experience'=>$experience,
                            'salary'=>$salary,
                            'vecancy_status'=>$vecancy_status,
                            'comp_location'=>$location,
                            'updated_at'=>Carbon::now()
                                ]);

                                if($update_company)
                                {
                                    log::info('Company vecancy updated Successfully');
         
                                         $id = $company_id;
                                         Log::info($id);
                                         return Redirect::route('dashborad_index',$id);   
                                }
                                else
                                {
                                 $msg='company vecancy detail can`t be updated';
                                 return redirect()->back()->with('failure','msg');
                                  Log::info('company vecancy can`t be updated');
                                }  
                       }
                       else
                       {
                                $insert_company=DB::table('vecancy')
                                ->insert([
                                'position'=>$position,
                                'experience'=>$experience,
                                'salary'=>$salary,
                                'vecancy_status'=>$vecancy_status,
                                'comp_location'=>$location,
                                'company_id'=>$company_id,
                                'created_at'=>Carbon::now()
                                    ]);
                                    if($insert_company)
                                    {
                                        log::info('Company vecancy inserted Successfully');
             
                                             $id = $company_id;
                                             Log::info($id);
                                             return Redirect::route('dashborad_index',$id);   
                                    }
                                    else
                                    {
                                     $msg='company vecancy detail can`t be inserted';
                                     return redirect()->back()->with('failure','msg');
                                      Log::info('company vecancy can`t be inserted');
                                    }  

                       }
                           
                        
                
           
        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }                
  }
 
  
      public function company_user_index($data)
    {
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
               $id = $data;
               $success='success';
               $user_count=DB::table('users')->where('company_id',$id)->count();
               if($user_count>0)
               {
                    $user_detail=DB::table('users')->where('company_id',$id)->get();
                  
               }
               else
               {
                    $user_detail='';
                  
               }
              
               $msg = "company Payment Detail Saved Successfully";
        return view('company_user_detail',compact('msg','id','success','user_detail','user_count'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }  
       public function company_vecancy_index($data)
    {
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
              $id = $data;
              $count_vecancy=DB::table('vecancy')->where('company_id',$id)->count();
              if($count_vecancy>0)
              {
                $vecancy_detail=DB::table('vecancy')->where('company_id',$id)->get();
              }
              else{
                $vecancy_detail="";
              }
             
              $success='success';
              $msg = "company User Detail Saved Successfully";
         return view('company_vecancy',compact('msg','id','success','count_vecancy','vecancy_detail'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }  
    public function company_register_index($data)
    {
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
             $id = $data;
             $success='success';
             $msg = "company register Detail Saved Successfully";
           
          return view('add_company',compact('msg','id','success'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }  
   public function company_dashborad_index()
    {
        try
        {
            if (session('username') == '') {
                return redirect('/')->with('failure', 'Please Login First');
            }
            
              
         
            $success='success';
            $states = DB::table('state')->get();
            $msg = "company Added Successfully";
          
         return view('dashboard',compact('msg','success','states'));

        } catch (QueryException $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        } catch (Exception $e) {
            Log::error('CompanyController : ' . $e->getMessage());
            return redirect()->back()->with('failure', $e->getMessage());
        }

    } 
   
}
