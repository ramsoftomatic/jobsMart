<?php

namespace App\Http\Controllers;

use App\resume_info;
use App\Job;
use App\Job_appplication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\File;
use Auth, Validator, Input, Redirect,Session; 
use App\Exception;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
date_default_timezone_set('Asia/Kolkata');

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'store']);
    }

    public function show(Request $request)
    {
        try{
        $states = DB::table('state')->get();
         $company = DB::table('company')->get();
          $staff = DB::table('staff')->get();
        return view('createJob',compact('states','company','staff'));
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
    public function getcity(Request $request)
    {
        try{
        $cities = DB::table('city')->where('state_id',$request->state_id)->get();
        $mycity = '<option>Select City </option>';
        foreach ($cities as $city) {
            //return $city->city_name;
          $mycity.='<option value="'.$city->city_id.'">'.$city->city_name.'</option>';
        }
        return response()->json(['city'=>$mycity]);
        }
        catch(QueryException $e)
        {
            
            return redirect()->back()->with('failure',"Database Query Error! [ ".$e->getMessage()." ]");
        }
        catch(Exception $e)
        {
            
            return redirect()->back()->with('failure',$q->getMessage())->withInput($request->all);
        }
    }

    public function create(Request $request)
    {
        try{
    	$current_timestamp = Carbon::now()->timestamp;
    	$current_time = Carbon::now();
    	$date = $current_time->toDateTimeString();

    	$rules = array(
    	    "company" =>"required|numeric",
    		"industry" => "required|string",
			"job_title" => "required|string",
			"job_description" => "required|string",
			"requirement" => "required|string",
			"salary_from" => "nullable|numeric",
            "salary_to" => "nullable|numeric",
            "salary_type" => "nullable|string",
			"job_location_state" => "required|numeric",
            "job_location_city" => "required|string",
            "experience_from" => "required|numeric",
            "experience_to" => "required|numeric",
            "experience_type" => "required|string",
			"status" => "required|string",
			"vacancy" => "nullable|numeric",
			"job_active_date" => "nullable|date|date_format:Y-m-d",
			"job_expiry_date" => "nullable|date|date_format:Y-m-d"
    	);

    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails())
    	{
            return Redirect::to('create-job')
            ->withErrors($validator)
            ->withInput($request->all);
        }
        else
        {
        	$oldjob = DB::table('jobs')->where('industry',$request->input('industry'))->where('job_title',$request->input('job_title'))->get();
        	if(empty($oldjob))
        	{
        		return redirect()->back()->with('failure','Job Already Added');
        	}
        	if($request->input('status')=='active')
        	{
        		$job = Job::insertGetId([
        		 'company' => $request->input('company'),
        		'industry' => $request->input('industry'),
				'job_title' => $request->input('job_title'),
				'job_description' =>  htmlspecialchars($request->input('job_description')),
				'requirement' => $request->input('requirement'),
				'salary_from' => $request->input('salary_from'),
                'salary_to' => $request->input('salary_to'),
                'salary_type' => $request->input('salary_type'),
				'job_location_state' => $request->input('job_location_state'),
                'job_location_city' => $request->input('job_location_city'),
                'experience_from' => $request->input('experience_from'),
                'experience_to' => $request->input('experience_to'),
                'experience_type' => $request->input('experience_type'),
				'status' => $request->input('status'),
				'vacancy' => $request->input('vacancy'),
				'create_date' => $date,
				'job_active_date' => $request->input('job_active_date'),
				'job_expiry_date' => $request->input('job_expiry_date'),
				'active_date' => $date,
        		]);
        	}
        	elseif($request->input('status')=='inactive')
        	{
        		$job = Job::insertGetId([
        		'company' => $request->input('company'),
        		'industry' => $request->input('industry'),
				'job_title' => $request->input('job_title'),
				'job_description' => htmlspecialchars($request->input('job_description')),
				'requirement' => $request->input('requirement'),
				'salary_from' => $request->input('salary_from'),
                'salary_to' => $request->input('salary_to'),
                'salary_type' => $request->input('salary_type'),
                'job_location_state' => $request->input('job_location_state'),
                'job_location_city' => $request->input('job_location_city'),
                'experience_from' => $request->input('experience_from'),
                'experience_to' => $request->input('experience_to'),
                'experience_type' => $request->input('experience_type'),
				'status' => $request->input('status'),
				'vacancy' => $request->input('vacancy'),
				'create_date' => $date,
				'job_active_date' => $request->input('job_active_date'),
				'job_expiry_date' => $request->input('job_expiry_date'),
        		]);
        	}
        	$assign_job = DB::table('job_assignment')->insert(['job_id'=>$job,'staff_id'=>$request->staff]);
             log::info($job);
             log::info($assign_job);
        	if($job)
        	{
        		return redirect()->back()->with('success','Job Created Successfully');
        	}
        	else
        	{
        		return  redirect()->back()->with('failure','Job Can`t be Created')->withInput($request->all);
        	}
        	
        }
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

    public function joblist(Request $request)
    {
        try{
    	if(Session::has('username'))
        {
            $records = DB::table('jobs')->leftjoin('state','jobs.job_location_state','=','state.state_id')->leftjoin('city','jobs.job_location_city','=','city.city_id')->orderBy('jobs.id')->get();
            return view('joblist', ['records' => $records]);
            //return $records;
        }
        else
            return Redirect::to('/');
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

    public function joblist2(Request $request)
    {
        try{
    	if(Session::has('username'))
        {
            // $records = DB::table('jobs')->orderBy('id')->get();
             $records = DB::table('jobs')->leftjoin('state','jobs.job_location_state','=','state.state_id')->leftjoin('city','jobs.job_location_city','=','city.city_id')->orderBy('jobs.id')->get();
            // return view('joblist', ['records' => $records]);
            return view('joblisttable', ['records' => $records]);
        }
        else
            return Redirect::to('/');
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

    public function updatestatus(Request $request)
    {
        try{
    	$current_timestamp = Carbon::now()->timestamp;
    	$current_time = Carbon::now();
    	$date = $current_time->toDateTimeString();

    	if($request->status=='active')
    		$update = DB::table('jobs')->where('id',$request->id)->update(['status'=>$request->status,'active_date'=>$date]);
    	elseif($request->status=='inactive')
    		$update = DB::table('jobs')->where('id',$request->id)->update(['status'=>$request->status,'inactive_date'=>$date]);

    	if($update)
    	{
    		$status = DB::table('jobs')->where('id',$request->id)->value('status');
    		return response()->json(['success'=>'Updated','status'=>$status]);
    	}
    	else
    	{
    		return response()->json(['failure'=>'Not Updated'])->withInput($request->all);
    	}
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

    public function editjob(Request $request)
    {
        if(Session::has('username'))
        {
            try{
            $states = DB::table('state')->get();
            $records = DB::table('jobs')->leftjoin('state','state.state_id','=','jobs.job_location_state')->leftjoin('city','city.city_id','=','jobs.job_location_city')->where('jobs.id',$request->id)->get();
            $state_id = DB::table('jobs')->where('id',$request->id)->value('job_location_state');
            $cities = DB::table('city')->where('state_id',$state_id)->get();
            return view('editjob', compact('records' ,'states','cities'));
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
        else
            return Redirect::to('/');
    }
    public function deletejob(Request $request)
    {
        if(Session::has('username'))
        {
            try{
            $delete = DB::table('jobs')->where('id',$request->id)->delete();
            if($delete)
            {
                return redirect()->back()->with('success','Job Deleted');
            }
            else
            {
                return redirect()->back()->with('failure','Job not Deleted');
            }
            }
            catch(QueryException $e)
            {
                
                return redirect()->back()->with('failure',"Database Query Error! [ ".$e->getMessage()." ]");
            }
            catch(Exception $e)
            {
                
                return redirect()->back()->with('failure',$q->getMessage());
            }
                // return view('editjob', ['records' => $records]);
        }
        else
            return Redirect::to('/');
    }

    public function update(Request $request)
    { 
        try{

            $rules = array(
            "industry" => "required|string",
            "job_title" => "required|string",
            "job_description" => "required|string",
            "requirement" => "required|string",
            "salary_from" => "nullable|numeric",
            "salary_to" => "nullable|numeric",
            "salary_type" => "nullable|string",
            "job_location_state" => "required|numeric",
            "job_location_city" => "required|string",
            "experience_from" => "required|numeric",
            "experience_to" => "required|numeric",
            "experience_type" => "required|string",
            "status" => "required|string",
            "vacancy" => "nullable|numeric",
            "job_active_date" => "nullable|date|date_format:Y-m-d",
            "job_expiry_date" => "nullable|date|date_format:Y-m-d"
        );

            // if($request->salary_from=="")
            // {
            //     $request->salary_from=$request->salary_to="NA";
            // }
            // if($request->vacancy='')
            // {
            //     $request->vacancy="NA";
            // }
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::back()
            ->withErrors($validator)
            ->withInput($request->all);
        }
        $update = 0;
        $current_timestamp = Carbon::now()->timestamp;
        $current_time = Carbon::now();
        $date = $current_time->toDateTimeString();

        $select = DB::table('jobs')->where('id',$request->id)->value('status');
        if($select!=$request->status)
        { 
            if($request->status=='active')
            { 
                $update = DB::table('jobs')->where('id',$request->id)->update(['industry'=>$request->industry,'job_title'=>$request->job_title,'job_description'=>htmlspecialchars($request->job_description),'job_location_state'=>$request->job_location_state,'job_location_city'=>$request->job_location_city,'requirement'=>$request->requirement,'salary_from'=>$request->salary_from,'salary_to'=>$request->salary_to,'salary_type'=>$request->salary_type,'experience_from'=>$request->experience_from,'experience_to'=>$request->experience_to,'experience_type'=>$request->experience_type,'vacancy'=>$request->vacancy,'job_active_date'=>$request->job_active_date,'job_expiry_date'=>$request->job_expiry_date,'status'=>$request->status,'active_date'=>$date]);
            }
            elseif($request->status=='inactive')
            { 
                $update = DB::table('jobs')->where('id',$request->id)->update(['industry'=>$request->industry,'job_title'=>$request->job_title,'job_description'=>htmlspecialchars($request->job_description),'job_location_state'=>$request->job_location_state,'job_location_city'=>$request->job_location_city,'requirement'=>$request->requirement,'salary_from'=>$request->salary_from,'salary_to'=>$request->salary_to,'salary_type'=>$request->salary_type,'experience_from'=>$request->experience_from,'experience_to'=>$request->experience_to,'experience_type'=>$request->experience_type,'vacancy'=>$request->vacancy,'job_active_date'=>$request->job_active_date,'job_expiry_date'=>$request->job_expiry_date,'status'=>$request->status,'inactive_date'=>$date]);
            }
        }
        else
        {
            $update = DB::table('jobs')->where('id',$request->id)->update(['industry'=>$request->industry,'job_title'=>$request->job_title,'job_description'=>htmlspecialchars($request->job_description),'job_location_state'=>$request->job_location_state,'job_location_city'=>$request->job_location_city,'requirement'=>$request->requirement,'salary_from'=>$request->salary_from,'salary_to'=>$request->salary_to,'salary_type'=>$request->salary_type,'experience_from'=>$request->experience_from,'experience_to'=>$request->experience_to,'experience_type'=>$request->experience_type,'vacancy'=>$request->vacancy,'job_active_date'=>$request->job_active_date,'job_expiry_date'=>$request->job_expiry_date]);
        }
        

        if($update)
        { 
            $status = DB::table('jobs')->where('id',$request->id)->value('status');
            return redirect()->back()->with('success','Updated');
        }
        else
        { 
            return redirect()->back()->with('failure','Not Updated')->withInput($request->all);
        }
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
    //--------------------------web job seeker submit data------------------------------//
     public function sumbit_resume(Request $request)
    {
        try{
            // return $request;
            
                    $first_name=$request->first_name;
                    $last_name=$request->last_name;
                    $dob=$request->dob;
                    $phone=$request->phone;
                    $email_id=$request->email_id;
                    $curr_state=$request->curr_state;
                    $curr_city=$request->curr_city;
                    $curr_area=$request->curr_area;
                    $pref_state=$request->pref_state;
                    $pref_city=$request->pref_city;
                    $pref_area=$request->pref_area;
                    $gender=$request->gender;
                    $work_exp=$request->work_exp;
                    $curr_annual_salary=$request->curr_annual_salary;
                    $curr_job_title=$request->curr_job_title;
                    $curr_functional_area=$request->curr_functional_area;
                    $curr_industry=$request->curr_industry;
                    $years_cjobs=$request->curr_job_years;
                    $education=$request->high_edu_level;
                    $resume1=$request->resumefile;
                    $subject="$education/$years_cjobs/$curr_city/$phone/$first_name $last_name - Applied";
                    $admin='vasai@jobsmartindia.com';
 
            
            if($resume1!='')
                {

                    $target_dir = 'resume/';
                    $filename2 = strtolower($resume1->getClientOriginalName());
                    $extension = strtolower($resume1->getClientOriginalExtension());
                    $file_name = pathinfo($filename2, PATHINFO_FILENAME);
                    $filename2 = $file_name  . '_' . strtotime(date('Y-m-d H:i:s')) . '.' . $extension;
                    $target_file = $target_dir . $filename2;
                    log::info($target_file);
                    if ($resume1->move(base_path() .'/'. $target_dir, $filename2)) 
                    {
                         
                        log::info('inside if condition');
                        log::info(base_path() . $target_file);
                        $resume_file = $target_file;

                        $insert_data = DB::table('candidate')->insert(['first_name'=>$first_name,'last_name'=>$last_name,'phone'=>$phone,'dob'=>$dob,'email_id'=>$email_id,'curr_state'=>$curr_state,'curr_city'=>$curr_city,'curr_area'=>$curr_area,'pref_state'=>$pref_state,'pref_city'=>$pref_city,'pref_area'=>$pref_area,'gender'=>$gender,'work_exp'=>$work_exp,'curr_annual_salary'=>$curr_annual_salary,'curr_job_title'=>$curr_job_title,'curr_functional_area'=>$curr_functional_area,'curr_industry'=>$curr_industry,'years_cjobs'=>$years_cjobs,'education'=>$education,'resume_file'=>$resume_file]);
                
                        log::info($insert_data);
                        // $email=array($email_id,$admin); //array of emails candidate and admin
                
                    //candidate
                    Mail::send('emails.candidate', ['first_name'=>$first_name], function ($message) use ($email_id ,$subject) 
                    {
                            $message->from('no-reply@dearsociety.in', 'Jobs Mart India')->to($email_id)->subject($subject);
                    });

                    //admin
                    Mail::send('emails.name', ['first_name'=>$first_name,'last_name'=>$last_name,'phone'=>$phone,'dob'=>$dob,'email_id'=>$email_id,'curr_state'=>$curr_state,'curr_city'=>$curr_city,'curr_area'=>$curr_area,'pref_state'=>$pref_state,'pref_city'=>$pref_city,'pref_area'=>$pref_area,'gender'=>$gender,'work_exp'=>$work_exp,'curr_annual_salary'=>$curr_annual_salary,'curr_job_title'=>$curr_job_title,'curr_functional_area'=>$curr_functional_area,'curr_industry'=>$curr_industry,'years_cjobs'=>$years_cjobs,'education'=>$education,'resume_file'=>$resume_file], function ($message) use ($admin ,$subject) 
                    {
                        $message->from('no-reply@dearsociety.in', 'Jobs Mart India')->to($admin)->subject($subject);
                    });
                    
                   

                                if($insert_data)
                              {
                                echo '<script>alert("resume has been submitted");
                                window.location.replace("https://www.jobsmartindia.com/job_seeker.php");
                            </script>';
                              }
                              else
                              {
                                echo '<script>alert("Something Went Wrong");
                                window.location.replace("https://www.jobsmartindia.com/job_seeker.php");
                            </script>';
                              }
                    } else {
                        log::info('inside else condition');
                        return redirect()->back()->with('alert-danger', "File Can't be uploaded");
                    }
                }   
       
                }
        catch(QueryException $e)
        {
            
            return redirect()->back()->with('failure',"Database Query Error! [ ".$e->getMessage()." ]");
        }
        catch(Exception $e)
        {
            
            return redirect()->back()->with('failure',$q->getMessage())->withInput($request->all);
        }
    }
    
    
    //candidate list//
    public function candidatelist(Request $request)
    {
        try{
        
            $candidate = DB::table('candidate')->get();
            return view('candidatelist', ['candidate' => $candidate]);
            log::info($candidate);
        
         
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
