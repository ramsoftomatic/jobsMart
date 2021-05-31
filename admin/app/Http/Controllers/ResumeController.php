<?php

namespace App\Http\Controllers;

/*use App\Http\Controllers\Cookie;*/
use App\resume_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\File;
use File;
use Auth, Validator, Input, Redirect,Session; 

date_default_timezone_set('Asia/Kolkata');

class ResumeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['only' => 'store']);
    }
    public function show(Request $request)
    {
        try{
     
         $company = DB::table('company')->get();
       
        return view('resume',compact('company'));
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
    public function get_jobs(Request $request)
    {
        try{
           $id= $request->val;
           if($id!='')
           {
            $job = DB::table('jobs')
            ->join('company','company.company_id','=','jobs.company')
            ->select('company.company_name','jobs.id','jobs.job_title')->wherein('jobs.company',$id)->get();
            $out='';
            
                foreach($job as $row)
                {
                    $out.="<option value=".$row->id.">".$row->job_title." (".$row->company_name.")</option>";
                }
                return $out;
           }
           else
           {
               return "<option>no record</option>";
           }
           
       
        //return view('resume',compact('company'));
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
    public function submit(Request $request)
    {
      
        $current_timestamp = Carbon::now()->timestamp;
    	$msg='';
        $rules = array(
        'name'    => 'required|regex:/^[a-zA-Z ]+$/',
        'email'    => 'required|email|unique:users', // make sure the email is an actual email
        'dob'    => 'nullable|date|date_format:Y-m-d',
        'mobile'    => 'required|numeric|digits:10',
        'cur_loc'    => 'nullable|string',
        'pref_loc'    => 'nullable|string',
        'gender'    => 'nullable|string',
        'skills'    => 'nullable|string',
        'total_exp'    => 'nullable|numeric',
        'cur_salary'    => 'nullable|numeric',
        'cur_desig'    => 'nullable|string',
        'cur_area'    => 'nullable|string',
        'cur_industry'    => 'nullable|string',
        'cur_company'    => 'nullable|string',
        'cur_company_exp'    => 'nullable|numeric',
        'notice_period'    => 'nullable|string',
        'high_edu_level' => 'nullable|string',
        'high_edu_stream'    => 'nullable|string',
        'high_edu_institute'    => 'nullable|string',
        'passing_year'    => 'nullable|string',
        'high_edu_course_type'    => 'nullable|string',
        'note'    => 'nullable|string',
        'resume'    => 'nullable|file|max:10000'

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('add-resume')
            ->withErrors($validator)
            ->withInput($request->all);
        } 
        $resume_id= $request->company_id;
       $jobs= $request->jobs;
       
        if($request->has('resume'))
        {
            $target_dir = 'uploads/';
            $file = $request->file('resume');
             $extension = strtolower($file->getClientOriginalExtension()); // getting image extension
              $filename = $request->input('name').'_'.$request->input('mobile').'_'.$current_timestamp.'.'.$extension;
             $target_file = $target_dir.$filename;

             if($extension!='pdf' && $extension!='doc' && $extension!='docx')
             {
                 return redirect()->back()->with('failure','Please Upload pdf/docx file only');
             }
             if($file->move(public_path().'/uploads/', $filename))
  			{
                  log::info("resume ".$filename);
            }
    		else
    		{
    			return redirect()->back()->with('failure','File cant be Uploaded');
    		}
        }
        else
        {
            $filename='';
            $target_file='';
        }
			
            $email = DB::table('resume_infos')->where('email', $request->email)->value('email');
            $mobile = DB::table('resume_infos')->where('mobile', $request->mobile)->value('mobile');
           
                if($email!='')
                {
                    $msg.='Email-Id is already registered';
                }
                if($mobile!='')
                {
                    $msg.=' Mobile number is already registered';
                }
                if($email!='' || $mobile!='')
                {
                    return redirect()->back()->with('failure',$msg)->withInput($request->all);
                }
              
  			
    			$resume = resume_info::create([
    			'name' => $request->input('name'),
    			'email' => $request->input('email'),
    			'dob' => $request->input('dob'),
    			'mobile' => $request->input('mobile'),
    			'cur_loc' => $request->input('cur_loc'),
    			'pref_loc' => $request->input('pref_loc'),
    			'gender' => $request->input('gender'),
                'skills' => $request->input('skills'),
    			'total_exp' => $request->input('total_exp'),
    			'cur_salary' => $request->input('cur_salary'),
    			'cur_desig' => $request->input('cur_desig'),
    			'cur_area' => $request->input('cur_area'),
    			'cur_industry' => $request->input('cur_industry'),
    			'cur_company' => $request->input('cur_company'),
    			'cur_company_exp' => $request->input('cur_company_exp'),
    			'notice_period' => $request->input('notice_period'),
    			'high_edu_level' => $request->input('high_edu_level'),
    			'high_edu_stream' => $request->input('high_edu_stream'),
    			'high_edu_institute' => $request->input('high_edu_institute'),
    			'passing_year' => $request->input('passing_year'),
    			'high_edu_course_type' => $request->input('high_edu_course_type'),
    			'note' => $request->input('note'),
                'resume' => $target_file,
                'created_at'=>carbon::now()
    			]);
                
    			if($resume)
    			{
                    $resume_id=DB::getPdo()->lastInsertId();
                    if($jobs!='')
                    {
                      
                        for($i=0;$i<sizeof($jobs);$i++)
                        {
                            $insert=DB::table('job_applications')->insert([
                                'job_id'=>$jobs[$i],
                                'resume_id'=>$resume_id,
                                'create_date'=>carbon::now()
                            ]);
                            
                        }
                        if($insert)
                            {
                                return redirect()->back()->with('success','Uploaded1 Successfully');
                            }
                            else
                            {
                                return redirect()->back()->with('success','Can`t Uploaded');
                            }
                    }
                   
    				return redirect()->back()->with('success','Uploaded Successfully');
    			}
                else
                {
                    unlink($target_file);
                    return redirect()->back()->with('failure','File cant be Uploaded')->withInput($request->all);
                }
    		
    }

    public function viewResume(Request $request){
        if(Session::has('username'))
        {
            $records = DB::table('resume_infos')->orderBy('resume_id','ASC')->get();
            foreach($records as $row)
            {
                $row->job_id=DB::table('job_applications')->where('resume_id',$row->resume_id)->value('job_id');
                $row->company=DB::table('jobs')->join('company','jobs.company','company.company_id')
                ->where('jobs.id',$row->job_id)->value('company.company_name');
                $row->job_title=DB::table('jobs')->join('company','jobs.company','company.company_id')
                ->where('jobs.id',$row->job_id)->value('jobs.job_title');
                
            }
          
            return view('view', ['records' => $records]);
        }
        else
            return Redirect::to('/');

        
    }
   
    public function deleteresume(Request $request)
    {
        if(Session::has('username'))
        {
            $delete = DB::table('resume_infos')->where('resume_id',$request->resume_id)->delete();
            if($delete)
            {
                return redirect()->back()->with('success','Resume Deleted');
            }
            else
            {
                return redirect()->back()->with('failure','Resume not Deleted');
            }
            // return view('editjob', ['records' => $records]);
        }
        else
            return Redirect::to('/');
    }

    public function viewDetailedResume(Request $request){
        if(Session::has('username'))
        {
            $resume = DB::table('resume_infos')->where('resume_id', $request->id)->get();
            return view('viewDetail', ['resume' => $resume]);
        }
        else
            return Redirect::to('/');
        
    }

    public function search(Request $request){ 
        $condition=array();
        $query="";
        $rules = array();
        if($request->name=='' && $request->skills=='' && $request->total_exp=='' && $request->cur_salary=='' && $request->high_edu_level=='')
        {
            return Redirect::to('search-candidate')
            ->with('failure','Required Atleast One Field For Search');
        }

        if($request->name!='')
        {
            $rules['name']='required|string';
            $condition['name']=$request->name;
        }
        if($request->skills!='')
        {
            $rules['skills']='required|string';
            $condition['skills']=$request->skills;
        }
        if($request->total_exp!='')
        {
            $rules['total_exp']='required|numeric';
            $condition['total_exp']=$request->total_exp;
        }
        if($request->cur_salary!='')
        {
            $rules['cur_salary']='required|string';
            $condition['cur_salary']=$request->cur_salary;
        }
        if($request->high_edu_level!='')
        {
            $rules['high_edu_level']='required|string';
            $condition['high_edu_level']=$request->high_edu_level;
        }

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::to('search-candidate')
            ->withErrors($validator)
            ->withInput();
        } 
        $data = DB::table('resume_infos')->where(function ($query) use ($condition) {
                foreach ($condition as $column => $key) { 
                    $value = array_get($column, $key);
                    if($column=='cur_salary')
                    {
                        if($key=='5000-10000')
                            $query->whereBetween('cur_salary', array(5000,10000));
                        elseif($key=='10001-15000')
                            $query->whereBetween('cur_salary', array(10001,15000));
                        elseif($key=='15001-20000')
                            $query->whereBetween('cur_salary', array(15001,20000));
                        elseif($key=='20001-25000')
                            $query->whereBetween('cur_salary', array(20001,25000));
                        elseif($key=='25001-30000')
                            $query->whereBetween('cur_salary', array(25001,30000));
                        elseif($key=='30001-35000')
                            $query->whereBetween('cur_salary', array(30001,35000));
                        elseif($key=='35001-40000')
                            $query->whereBetween('cur_salary', array(35001,40000));
                        elseif($key=='40001-45000')
                            $query->whereBetween('cur_salary', array(40001,45000));
                        elseif($key=='45001-50000')
                            $query->whereBetween('cur_salary', array(45001,50000));
                        elseif($key=='50001+')
                            $query->where('cur_salary','>=','50001');
                    }
                elseif($column=='high_edu_level')
                    {
                        if($key=='10')
                            $query->where($column , 'like' , "10%");
                        if($key=='12')
                            $query->where($column , 'like' , "12%");
                        if($key=='deploma')
                            $query->where($column , 'like' , "d%");
                        if($key=='graduate')
                            $query->where($column , 'like' , "b%");
                        if($key=='postgraduate')
                            $query->where($column , 'like' , "m%");
                    }
                else
                    {
                        $query->where($column , 'like' , "%$key%");
                    }
                }})->get();
        $count = $data->count();
        if(!$data->isEmpty())
        {
            return Redirect::to('search-candidate')->with('data',$data)->with('count',$count)->with('autofocus', true);;
        }
        else
        {
             return Redirect::to('search-candidate')
            ->with('failure','No candidate found');
        }
    }

    public function update(Request $request)
    {
        $current_timestamp = Carbon::now()->timestamp;
        $msg='';
            $rules = array(
        'name'    => 'required|regex:/^[a-zA-Z ]+$/',
        'email'    => 'required|email|unique:users', // make sure the email is an actual email
        'dob'    => 'nullable|date|date|date_format:Y-m-d',
        'mobile'    => 'required|numeric|digits:10',
        'cur_loc'    => 'nullable|string',
        'pref_loc'    => 'nullable|string',
        'gender'    => 'nullable|string',
        'skills'    => 'nullable|string',
        'total_exp'    => 'nullable|numeric',
        'cur_salary'    => 'nullable|numeric',
        'cur_desig'    => 'nullable|string',
        'cur_area'    => 'nullable|string',
        'cur_industry'    => 'nullable|string',
        'cur_company'    => 'nullable|string',
        'cur_company_exp'    => 'nullable|numeric',
        'notice_period'    => 'nullable|string',
        'high_edu_level' => 'nullable|string',
        'high_edu_stream'    => 'nullable|string',
        'high_edu_institute'    => 'nullable|string',
        'passing_year'    => 'nullable|string',
        'high_edu_course_type'    => 'nullable|string',
        'note'    => 'nullable|string',
        'resume'    => 'nullable|file|max:10000'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('view-detail-'.$request->resume_id.'')
            ->withErrors($validator)
            ->withInput($request->all);
        } 

        $email = DB::table('resume_infos')->where('email', $request->email)->where('resume_id', '!=',$request->resume_id)->value('email');
        $mobile = DB::table('resume_infos')->where('mobile', $request->mobile)->where('resume_id', '!=',$request->resume_id)->value('mobile');
           
        if($email!='')
        {
            $msg.='Email-Id is already registered';
        }
        if($mobile!='')
        {
            $msg.=' Mobile number is already registered';
        }
        if($email!='' || $mobile!='')
        {

            return redirect()->back()->with('failure',$msg)->withInput($request->all);
        }


        if($request->hasfile('resume'))
         {
            $oldfile = DB::table('resume_infos')->where('resume_id',$request->input('resume_id'))->value('resume');
            $target_dir = 'uploads/';
            $file = $request->file('resume');
            $extension = strtolower($file->getClientOriginalExtension()); // getting image extension
            $filename = $request->input('name').'_'.$request->input('mobile').'_'.$current_timestamp.'.'.$extension;
            $target_file = $target_dir.$filename;
            if($extension!='pdf' && $extension!='doc' && $extension!='docx')
            {
                return redirect()->back()->with('failure','Please Upload pdf/docx file only');
            }
            if($file->move(public_path().'/uploads/', $filename))
            {
                
                $resume = DB::table('resume_infos')->where('resume_id',$request->input('resume_id'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'mobile' => $request->input('mobile'),
                'cur_loc' => $request->input('cur_loc'),
                'pref_loc' => $request->input('pref_loc'),
                'gender' => $request->input('gender'),
                'skills' => $request->input('skills'),
                'total_exp' => $request->input('total_exp'),
                'cur_salary' => $request->input('cur_salary'),
                'cur_desig' => $request->input('cur_desig'),
                'cur_area' => $request->input('cur_area'),
                'cur_industry' => $request->input('cur_industry'),
                'cur_company' => $request->input('cur_company'),
                'cur_company_exp' => $request->input('cur_company_exp'),
                'notice_period' => $request->input('notice_period'),
                'high_edu_level' => $request->input('high_edu_level'),
                'high_edu_stream' => $request->input('high_edu_stream'),
                'high_edu_institute' => $request->input('high_edu_institute'),
                'passing_year' => $request->input('passing_year'),
                'high_edu_course_type' => $request->input('high_edu_course_type'),
                'note' => $request->input('note'),
                'resume' => $target_file
                ]);

                if($resume)
                {
                    // if(file_exists($oldfile))
                    // {unlink($oldfile);}
                    return redirect()->back()->with('success','Updated Successfully');        
                }
                else
                {
                    unlink($target_file);
                    return redirect()->back()->with('failure','Resume cant be Updated');
                }
            }
            else
            {
                return redirect()->back()->with('failure','File cant be Uploaded');
            }
         }
         else
         {
               $resume = DB::table('resume_infos')->where('resume_id',$request->input('resume_id'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'mobile' => $request->input('mobile'),
                'cur_loc' => $request->input('cur_loc'),
                'pref_loc' => $request->input('pref_loc'),
                'gender' => $request->input('gender'),
                'skills' => $request->input('skills'),
                'total_exp' => $request->input('total_exp'),
                'cur_salary' => $request->input('cur_salary'),
                'cur_desig' => $request->input('cur_desig'),
                'cur_area' => $request->input('cur_area'),
                'cur_industry' => $request->input('cur_industry'),
                'cur_company' => $request->input('cur_company'),
                'cur_company_exp' => $request->input('cur_company_exp'),
                'notice_period' => $request->input('notice_period'),
                'high_edu_level' => $request->input('high_edu_level'),
                'high_edu_stream' => $request->input('high_edu_stream'),
                'high_edu_institute' => $request->input('high_edu_institute'),
                'passing_year' => $request->input('passing_year'),
                'high_edu_course_type' => $request->input('high_edu_course_type'),
                'note' => $request->input('note')
                ]);

                if($resume)
                {
                    return redirect()->back()->with('success','Updated Successfully');
                }
                else
                {
                    return redirect()->back()->with('failure','Resume cant be Updated');
                }
            }
    }



    public function uploadcsv(Request $request){
        $msg='';
        $i=0;
        $j=0;
        $k=0;
        $l=0; $inserted=0;
        $validations=''; $errormsg='';
        if($request->hasFile('csvfile')){
            $extension = strtolower($request->file('csvfile')->getClientOriginalExtension()); 
            if($extension!='csv')
            {
                return redirect()->back()->with('failure','Please Upload csv file only');
            }

            $header = NULL;
            $delimiter=',';
            $data = array();
            if (($handle = fopen($request->file('csvfile'), 'r')) !== FALSE)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
                {
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }


            $rules = array(
                    'name'    => 'required|regex:/^[a-zA-Z ]+$/',
                    'email'    => 'required|email|unique:users', // make sure the email is an actual email
                    'dob'    => 'nullable|date',
                    'mobile'    => 'required|numeric|digits:10',
                    'cur_loc'    => 'nullable|string',
                    'pref_loc'    => 'nullable|string',
                    'gender'    => 'nullable|string',
                    'skills'    => 'nullable|string',
                    'total_exp'    => 'nullable|numeric',
                    'cur_salary'    => 'nullable|numeric',
                    'cur_desig'    => 'nullable|string',
                    'cur_area'    => 'nullable|string',
                    'cur_industry'    => 'nullable|string',
                    'cur_company'    => 'nullable|string',
                    'cur_company_exp'    => 'nullable|numeric',
                    'notice_period'    => 'nullable|string',
                    'high_edu_level' => 'nullable|string',
                    'high_edu_stream'    => 'nullable|string',
                    'high_edu_institute'    => 'nullable|string',
                    'passing_year'    => 'nullable|string',
                    'high_edu_course_type'    => 'nullable|string',
                    'note'    => 'nullable|string',
                    'resume'    =>'nullable|string',
                );

            foreach ($data as $value) {
                $i++;
                $validator = Validator::make($value, $rules);
                if ($validator->fails()) {
                    $k++; $l++;
                    // return $validator->messages();
                    // return Redirect::to('upload-csv')
                    // ->withErrors($validator);
                    $validations.= "Validation Error in line ".$i." : ";
                    $errormsg.="Validation Error : ";
                    foreach ($validator->errors()->all() as $error)
                    {
                        $validations.= $error." ";
                        $errormsg.= $error." ";

                    }
                    $validations.= "<br>";
                    $errormsg.="<br>";

                }
                $email = DB::table('resume_infos')->where('email', $value['email'])->value('email');
                $mobile = DB::table('resume_infos')->where('mobile', $value['mobile'])->value('mobile');
                   // return $email;
                if($email!='' || $mobile!='')
                {
                    $msg.= 'Duplication Error in line :'.$i.' :';
                    $errormsg.="Duplication Error : ";
                }
                if($email!='')
                {
                    $msg.=' email-id '.$email;
                    $errormsg.=' email-id '.$email;
                }
                if($mobile!='')
                {
                    $msg.=' mobile number '.$mobile;
                    $errormsg.=' mobile number '.$mobile;
                }
                if($email!='' || $mobile!='')
                {

                    $j++; $l++;
                    $msg.= ' is already registered <br>';
                    $errormsg.=' is already registered <br>';
                    //continue;
                    //return redirect()->back()->with('failure',$msg)->withInput();
                }
                if($l==0)
                {
                    $insertrow = array('name' => $value['name'],'email' => $value['email'],'dob' => $value['dob'],'mobile' => $value['mobile'],'cur_loc' => $value['cur_loc'],'pref_loc' => $value['pref_loc'],'gender' => $value['gender'],'skills' => $value['skills'],'total_exp' => $value['total_exp'],'cur_salary' => $value['cur_salary'],'cur_desig' => $value['cur_desig'],'cur_area' => $value['cur_area'],'cur_industry' => $value['cur_industry'],'cur_company' => $value['cur_company'],'cur_company_exp' => $value['cur_company_exp'],'notice_period' => $value['notice_period'],'high_edu_level' => $value['high_edu_level'],'high_edu_stream' => $value['high_edu_stream'],'high_edu_institute' => $value['high_edu_institute'],'passing_year' => $value['passing_year'],'high_edu_course_type' => $value['high_edu_course_type'],'note' => $value['note'],'resume' => $value['resume']);
                
                        $result = DB::table('resume_infos')->insert($insertrow);
                        if(!$result)
                        {
                            $msg.="Row no : ".$i." cannot be inserted ";
                        }
                        else
                        {
                            $inserted++;
                        }

                }
                else
                {
                    if($validator->fails() && ($email!='' || $mobile!=''))
                    {
                        $inserterror = array('name' => $value['name'],'email' => $value['email'],'dob' => $value['dob'],'mobile' => $value['mobile'],'cur_loc' => $value['cur_loc'],'pref_loc' => $value['pref_loc'],'gender' => $value['gender'],'skills' => $value['skills'],'total_exp' => $value['total_exp'],'cur_salary' => $value['cur_salary'],'cur_desig' => $value['cur_desig'],'cur_area' => $value['cur_area'],'cur_industry' => $value['cur_industry'],'cur_company' => $value['cur_company'],'cur_company_exp' => $value['cur_company_exp'],'notice_period' => $value['notice_period'],'high_edu_level' => $value['high_edu_level'],'high_edu_stream' => $value['high_edu_stream'],'high_edu_institute' => $value['high_edu_institute'],'passing_year' => $value['passing_year'],'high_edu_course_type' => $value['high_edu_course_type'],'note' => $value['note'],'resume' => $value['resume'],'duplicate_error'=>'true','validate_error'=>'true','error_detail'=>$errormsg);
                    }
                    elseif(!($validator->fails()) && ($email!='' || $mobile!=''))
                    {
                        $inserterror = array('name' => $value['name'],'email' => $value['email'],'dob' => $value['dob'],'mobile' => $value['mobile'],'cur_loc' => $value['cur_loc'],'pref_loc' => $value['pref_loc'],'gender' => $value['gender'],'skills' => $value['skills'],'total_exp' => $value['total_exp'],'cur_salary' => $value['cur_salary'],'cur_desig' => $value['cur_desig'],'cur_area' => $value['cur_area'],'cur_industry' => $value['cur_industry'],'cur_company' => $value['cur_company'],'cur_company_exp' => $value['cur_company_exp'],'notice_period' => $value['notice_period'],'high_edu_level' => $value['high_edu_level'],'high_edu_stream' => $value['high_edu_stream'],'high_edu_institute' => $value['high_edu_institute'],'passing_year' => $value['passing_year'],'high_edu_course_type' => $value['high_edu_course_type'],'note' => $value['note'],'resume' => $value['resume'],'duplicate_error'=>'true','error_detail'=>$errormsg);

                    }
                    elseif($validator->fails() && !($email!='' || $mobile!=''))
                    {
                        $inserterror = array('name' => $value['name'],'email' => $value['email'],'dob' => $value['dob'],'mobile' => $value['mobile'],'cur_loc' => $value['cur_loc'],'pref_loc' => $value['pref_loc'],'gender' => $value['gender'],'skills' => $value['skills'],'total_exp' => $value['total_exp'],'cur_salary' => $value['cur_salary'],'cur_desig' => $value['cur_desig'],'cur_area' => $value['cur_area'],'cur_industry' => $value['cur_industry'],'cur_company' => $value['cur_company'],'cur_company_exp' => $value['cur_company_exp'],'notice_period' => $value['notice_period'],'high_edu_level' => $value['high_edu_level'],'high_edu_stream' => $value['high_edu_stream'],'high_edu_institute' => $value['high_edu_institute'],'passing_year' => $value['passing_year'],'high_edu_course_type' => $value['high_edu_course_type'],'note' => $value['note'],'resume' => $value['resume'],'validate_error'=>'true','error_detail'=>$errormsg);

                    }

                     $errorresult = DB::table('error')->insert($inserterror);
                     $errormsg='';
                     if(!$errorresult)
                     {
                        die(mysqli_error());
                     }

                }
                $l=0;               
            }
            if($k>0 || $j>0)
            {
                //return $validations;
                $csverror = $validations."<br>".$msg."<br><br>".$inserted." rows inserted out of ".$i;
                return redirect()->back()->with('failure',json_encode($csverror))->withInput();
            }
            // if($j>0)
            // {
            //     return redirect()->back()->with('failure',json_encode($msg))->withInput();
            // }
            else
            {
                return redirect()->back()->with('success','Uploaded Successfully');
            }

        }
        else
        {
            return redirect()->back()->with('failure','Request data does not have any files to import.');
        }  
    } 


    public function uploadresume(Request $request)
    {
        $files = $request->file('resumefile');
        $allowedfileExtension=['pdf','docx'];
        $count=0; $count1=0;
        $total=0; $success=0; $ispresent=0; $msg2='';
        $msg=''; $msg1='';
        if(!empty($files))
        {
            foreach($files as $file){ $total++;
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check)                 
                {
                    // if(File::exists(public_path('uploads\\'.$filename)))
                    // {
                    //     return 1;
                    //     $count1++;
                    //     if($count1>1)
                    //     $msg1.=' ,'.$filename.' already exist';
                    //     else
                    //     $msg1.=' '.$filename.' already exist';
                    // }
                    // else
                    // {
                        $ispresent = DB::table('resume_infos')->where('resume','uploads/'.$filename)->orWhere('resume',$filename)->count();
                        if($ispresent==0)
                        {
                            $msg1.=$filename.' File is not defined in any resume.<br>';
                            $count1++;
                            //return redirect()->back()->with('failure','Files is not defined in any resume');                            
                        }
                        $isuploaded = $file->move(public_path().'/uploads/', $filename.'.'.$extension);
                    // }
                }
                else
                {
                    $count++;
                    $msg.= ' File '.$filename;
                }
            }
            if($count>0 || $count1>0)
            {
                $success = $total-($count+$count1);
                if($success==0)
                {
                if($count>0 && $count1==0)
                Session::flash('failure',$count.' Files are not in DOCX/PDF format.'); 
                if($count==0 && $count1>0)
                Session::flash('failure',$msg1);
                if($count>0 && $count1>0)
                Session::flash('failure',$msg1.' '.$count.' Files are not in DOCX/PDF format.');
                }
                if($success>0)
                {
                if($count>0 && $count1==0)
                Session::flash('failure',$count.' Files are not in DOCX/PDF format. '.$success.' File Uploaded'); 
                if($count==0 && $count1>0)
                Session::flash('failure',$msg1.' '.$success.' File Uploaded');
                if($count>0 && $count1>0)
                Session::flash('failure',$msg1.' '.$count.' Files are not in DOCX/PDF format. '.$success.' File Uploaded');
                }
                // Session::flash('success',$success.' Files Uploaded Successfully!'); 
                return redirect()->back();
            }
            else
            {
                return redirect()->back()->with('success','Files Uploaded Successfully');
            }
            
        }
    }

    public function errorlist(Request $request)
    {
        if(Session::has('username'))
        {
            $records = DB::table('error')->orderBy('error_id')->get();
            return view('errorlist', ['records' => $records]);
        }
        else
            return Redirect::to('/');

    }

    public function errorlist2(Request $request)
    {
        if(Session::has('username'))
        {
            $records = DB::table('error')->orderBy('error_id')->get();
            return view('errorlisttable', ['records' => $records]);
        }
        else
            return Redirect::to('/');

    }

    public function rectifyerror(Request $request)
    {
        if(Session::has('username'))
        {
            $records = DB::table('error')->where('error_id',$request->error_id)->get();
            return view('rectifyerror', ['records' => $records]);
        }
        else
            return Redirect::to('/');
    }

    public function deleteerror(Request $request)
    {
        if(Session::has('username'))
        {
            $delete = DB::table('error')->where('error_id',$request->id)->delete();
            if($delete)
            {
                return redirect()->back()->with('success','Error record Deleted');
            }
            else
            {
                return redirect()->back()->with('failure','Error record not Deleted');
            }
            // return view('editjob', ['records' => $records]);
        }
        else
            return Redirect::to('/');
    }

    public function rectify(Request $request)
    {
        $current_timestamp = Carbon::now()->timestamp;
        $msg='';
            $rules = array(
        'name'    => 'required|regex:/^[a-zA-Z ]+$/',
        'email'    => 'required|email|unique:users', // make sure the email is an actual email
        'dob'    => 'nullable|date|date|date_format:Y-m-d',
        'mobile'    => 'required|numeric|digits:10',
        'cur_loc'    => 'nullable|string',
        'pref_loc'    => 'nullable|string',
        'gender'    => 'nullable|string',
        'skills'    => 'nullable|string',
        'total_exp'    => 'nullable|numeric',
        'cur_salary'    => 'nullable|numeric',
        'cur_desig'    => 'nullable|string',
        'cur_area'    => 'nullable|string',
        'cur_industry'    => 'nullable|string',
        'cur_company'    => 'nullable|string',
        'cur_company_exp'    => 'nullable|numeric',
        'notice_period'    => 'nullable|string',
        'high_edu_level' => 'nullable|string',
        'high_edu_stream'    => 'nullable|string',
        'high_edu_institute'    => 'nullable|string',
        'passing_year'    => 'nullable|string',
        'high_edu_course_type'    => 'nullable|string',
        'note'    => 'nullable|string',
        'resume'    => 'nullable|file|max:10000'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('rectify-error-'.$request->error_id.'')
            ->withErrors($validator)
            ->withInput($request->all);
        }
        $email = DB::table('resume_infos')->where('email', $request->email)->value('email');
        $mobile = DB::table('resume_infos')->where('mobile', $request->mobile)->value('mobile');
           
        if($email!='')
        {
            $msg.='Email-Id is already registered';
        }
        if($mobile!='')
        {
            $msg.=' Mobile number is already registered';
        }
        if($email!='' || $mobile!='')
        {

            return redirect()->back()->with('failure',$msg)->withInput($request->all);
        }
         else
         {
               $resume = resume_info::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'mobile' => $request->input('mobile'),
                'cur_loc' => $request->input('cur_loc'),
                'pref_loc' => $request->input('pref_loc'),
                'gender' => $request->input('gender'),
                'skills' => $request->input('skills'),
                'total_exp' => $request->input('total_exp'),
                'cur_salary' => $request->input('cur_salary'),
                'cur_desig' => $request->input('cur_desig'),
                'cur_area' => $request->input('cur_area'),
                'cur_industry' => $request->input('cur_industry'),
                'cur_company' => $request->input('cur_company'),
                'cur_company_exp' => $request->input('cur_company_exp'),
                'notice_period' => $request->input('notice_period'),
                'high_edu_level' => $request->input('high_edu_level'),
                'high_edu_stream' => $request->input('high_edu_stream'),
                'high_edu_institute' => $request->input('high_edu_institute'),
                'passing_year' => $request->input('passing_year'),
                'high_edu_course_type' => $request->input('high_edu_course_type'),
                'note' => $request->input('note')
                ]);

                if($resume)
                {
                    $deleteerror = DB::table('error')->where('error_id',$request->input('error_id'))->delete();
                    if($deleteerror)
                    return redirect('error-list')->with('success','Rectified Successfully');
                }
                else
                {
                    return redirect('error-list')->with('failure','Resume cant be Updated');
                }
            }        
    }
    public function candidate_applied_index(Request $request)
    {
        try
        {
        
            if(Session::has('username'))
            {
              
                $jobs=DB::table('jobs')->where('status','active')->get();
                $data_array=array();
                foreach($jobs as $job)
                {
                    $data_array[]=DB::table('job_applications')
                    ->join('resume_infos','job_applications.resume_id','resume_infos.resume_id')
                    ->join('jobs','job_applications.job_id','jobs.id')
                    ->select('resume_infos.*','jobs.*','job_applications.create_date as apply_at')
                    ->where('job_applications.job_id',$job->id)->get();
                }
                return view('candidate_applied',compact('data_array'));
            
              
            }
            else
            {
                
                return Redirect::to('/');
    
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
    }
    public function search_candidate(Request $request)
    {
        try
        {
        
            if(Session::has('username'))
            {
                $search_type=$request->search_type;
                if($search_type=='job_wise')
                {
                    $jobs=DB::table('jobs')->where('status','active')->get();
                    $data_array=array();
                    foreach($jobs as $job)
                    {
                       $data_array[]=DB::table('job_applications')
                        ->join('resume_infos','job_applications.resume_id','resume_infos.resume_id')
                        ->join('jobs','job_applications.job_id','jobs.id')
                        ->select('resume_infos.*','jobs.*','job_applications.create_date as apply_at')
                        ->where('job_id',$job->id)->get();
                    }
                            $out='<table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Sr NO</th>
                                <th>Job</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mob No</th>
                                <th>DOB</th>
                                <th>Total Experience</th>
                                <th>Education</th>
                                <th>Apply at</th>
                                <th>Resume</th>
                                </tr>
                                </thead>
                                <tbody>';
                            $j=1;
                                for($i=0;$i<sizeof($data_array);$i++)
                                {
                                foreach($data_array[$i] as $row)
                                {
                                $out.='<tr>
                                <td align="center">'.$j++.'</td>
                                <td>'.$row->job_title.'</td>
                                <td>'.$row->name.'</td>
                                <td>'.$row->email.'</td>
                                <td align="center">'.$row->mobile.'</td>
                                <td align="center">'; 
                                if($row->dob!='') 
                                {
                                date('d-m-Y',strtotime($row->dob));
                                }
                                $out.='</td>
                                <td align="center">';
                                    if($row->total_exp!='')
                                    $row->total_exp.' yr ';
                                    $out.='</td>
                                <td align="center">'.$row->high_edu_level.'</td>
                                <td align="center">'.date('d-m-Y',strtotime($row->apply_at)).'</td>
                                <td><a href="public/'.$row->resume.'" target="_blank">View Resume</a></td>
                                </tr>';
                                }
                                } 
                                $out.='</tbody>
                            </table>';
                                return $out;

                }
                
                if($search_type=='candidate_wise')
                {
                    $candidates=DB::table('resume_infos')->get();
                    $data_array=array();
                    foreach($candidates as $candidate)
                    {
                       $data_array[]=DB::table('job_applications')
                        ->join('resume_infos','job_applications.resume_id','resume_infos.resume_id')
                        ->join('jobs','job_applications.job_id','jobs.id')
                        ->select('resume_infos.*','jobs.*','job_applications.create_date as apply_at')
                        ->where('job_applications.resume_id',$candidate->resume_id)
                        ->where('jobs.status','active')
                        ->get();
                    }
                            $out='<table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Sr NO</th>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Email</th>
                                <th>Mob No</th>
                                <th>DOB</th>
                                <th>Total Experience</th>
                                <th>Education</th>
                                <th>Apply at</th>
                                <th>Resume</th>
                                </tr>
                                </thead>
                                <tbody>';
                            $j=1;
                                for($i=0;$i<sizeof($data_array);$i++)
                                {
                                foreach($data_array[$i] as $row)
                                {
                                $out.='<tr>
                                <td align="center">'.$j++.'</td>
                                <td>'.$row->name.'</td>
                                <td>'.$row->job_title.'</td>
                               
                                <td>'.$row->email.'</td>
                                <td align="center">'.$row->mobile.'</td>
                                <td align="center">'; 
                                if($row->dob!='') 
                                {
                                date('d-m-Y',strtotime($row->dob));
                                }
                                $out.='</td>
                                <td align="center">';
                                    if($row->total_exp!='')
                                    $row->total_exp.' yr ';
                                    $out.='</td>
                                <td align="center">'.$row->high_edu_level.'</td>
                                <td align="center">'.date('d-m-Y',strtotime($row->apply_at)).'</td>
                                <td><a href="public/'.$row->resume.'" target="_blank">View Resume</a></td>
                                </tr>';
                                }
                                } 
                                $out.='</tbody>
                            </table>';
                                return $out;

                }
            
              
            }
            else
            {
                
                return Redirect::to('/');
    
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
    }
    public function apply_job(Request $request)
    {
        try
        {
            return 'success';
            return $request->all();
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
}
