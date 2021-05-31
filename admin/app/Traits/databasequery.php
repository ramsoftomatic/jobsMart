<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\Mail;

date_default_timezone_set('Asia/Kolkata');

trait databasequery
{   

    public static function addcompany1($company_name,$mobile,$company_email,$url,$gst,$charges,$employee_no,$establish_year,$turnover,$placement_policy,$branch,$industry,$special_remark,$product_of_co,$firm,$logo,$payment_term,$payment_termlink)
    { 

      
        try
        {	
            $current_timestamp = Carbon::now()->timestamp;
            
            $words = explode(" ", $company_name);//cronyms for company Name
            $acronym = "";
            foreach ($words as $w) {
                $acronym .= $w[0];
            }
            $fname=strtolower($acronym);
            //////////////////////////Logo File Uploading//////////////////////////
            $target_dir = 'logo/';
            $extension = strtolower($logo->getClientOriginalExtension()); // getting image extension
            $filename = $fname.'_'.$current_timestamp.'.'.$extension;
            $target_file = $target_dir.$filename;
            $target_dir1 = 'firm/';
            $extension1 = strtolower($firm->getClientOriginalExtension()); // getting image extension
            $filename1 = $fname.'_'.$current_timestamp.'.'.$extension1;
            $target_file1 = $target_dir1.$filename1;
            $target_dir2 = 'payment_term/';
            $extension2 = strtolower($payment_termlink->getClientOriginalExtension()); // getting image extension
            $filename2 = $fname.'_'.$current_timestamp.'.'.$extension2;
            $target_file2 = $target_dir2.$filename2;

            $logostatus = $firmstatus = $paymentpolicystatus = 'true';

            if($logo!=null)
            {
                $logostatus = $logo->move(base_path().'/logo/', $filename);
            }
           if($firm!=null)
            {
                $firmstatus = $firm->move(base_path().'/firm/', $filename1);
            }
            if($payment_termlink!=null)
            {
                $paymentpolicystatus =$payment_termlink->move(base_path().'/payment_term/', $filename2);
            }

 
            if($logostatus && $firmstatus && $paymentpolicystatus) //if file move then go into if condition
  			{                  
                $insert = DB::table('company')->insert([
                    'company_name'=>$company_name,
                    'contact_no'=>$mobile,
                    'company_email'=>$company_email, 
                    'url'=>$url, 
                    'gst_no'=>$gst, 
                    'charges'=>$charges,
                    'no_employee'=>$employee_no,
                    'establish_year'=>$establish_year, 
                    'turnover'=>$turnover,                     
                    'placement_policy'=>$placement_policy,
                    'branches'=>$branch, 
                    'special_remark'=>$special_remark,
                    'industry'=>$industry,
                    'product_of_co'=>$product_of_co, 
                    'form_firm'=>$target_file1,
                    'logo'=>$target_file, 
                    'payment_term'=>$payment_term,
                    'payment_term_link'=>$target_file2,                                 
                
                ]);

                if($insert)
                {
                   $id = DB::table('company')->max('company_id');
                        return $id;
                }
                else
                {
                     return null; 
                }
            }
            else
            {
                 return null; 
            }
        }
        catch(QueryException $e)
        {
            Log::error('databasequery Trait > addcompany1 > database error: '.$e->getMessage());
            return null;
        }
        catch(Exception $e)
        {
            Log::error('databasequery Trait > addcompany1: '.$e->getMessage());
            return null;
        }
        

    }
    public static function updatecompany($company_id,$bulding,$landmark,$location,$pincode,$state,$city,$owner_name,$owner_email,$owner_phone)
    {
        try{
            $isUpdated = DB::table('company')->where('company_id',$company_id)->update([
                'bulding'=>$bulding,
                'landmark'=>$landmark,
                'location'=>$location,
                'pincode'=>$pincode,
                'state'=>$state,
                'city'=>$city,
                'owner_name'=>$owner_name,
                'owner_email'=>$owner_email,
                'owner_phone'=>$owner_phone,                       
            
            ]);
            Log::info($isUpdated);
            if($isUpdated>=0)
            {
                return true;
            }else
            {
                return false; 
            }
        }
            catch(QueryException $e)
            {
                Log::error('databasequery Trait > updatecompany > database error: '.$e->getMessage());
                return null;
            }
            catch(Exception $e)
            {
                Log::error('databasequery Trait > updatecompany: '.$e->getMessage());
                return null;
            }
    }

    public static function addcontactperson($company_id,$person_name,$person_email,$person_phone)
    {
      
        try
        {
            Log::info($company_id);       
            $insertcontactperson = DB::table('contact_person_detail')->insert([            
                'person_name'=>$person_name,
                'person_email'=>$person_email,
                'person_phone'=>$person_phone,
                'company_id'=>$company_id,                           
            
            ]);
            Log::info($insertcontactperson);
            if($insertcontactperson)
            {
                return true;
            }else{
                return false;
            }
        }
        catch(QueryException $e)
        {
            Log::error('databasequery Trait > addcontactperson > database error: '.$e->getMessage());
            return null;
        }
        catch(Exception $e)
        {
            Log::error('databasequery Trait > addcontactperson: '.$e->getMessage());
            return null;
        }
    }

    public static function addusers($company_id,$company_user_name,$company_user_email,$company_user_phone,$role_id,$username,$password)
    { 
        try
        {	                 
                $insertuser = DB::table('users')->insert([
                    'name'=>$company_user_name,
                    'email'=>$company_user_email,
                    'phone_no'=>$company_user_phone,
                    'company_id' =>$company_id,
                    'role_id' =>$role_id,
                    'username'=>$username,
                    'password'=>bcrypt($password),
                ]);
                log::info($insertuser);
                if($insertuser)
                {
                    $id = DB::table('users')->max('id');//if $insert then return id/////////
                    return $id;
                }else{
                    return null;
                }          

         }         
       
            catch(QueryException $e)
        {
            Log::error('databasequery Trait > addcompanyuser > database error: '.$e->getMessage());
            return null;
        }
        catch(Exception $e)
        {
            Log::error('databasequery Trait > addcompanyuser : '.$e->getMessage());
            return null;
        }

    }
    public static function add_employee($user_id,$id_type,$id_no,$address,$joining_date)
    { 
        try
        {	                 
                $insertemployee = DB::table('employee')->insert([
                    'user_id'=>$user_id,
                    'id_type'=>$id_type,
                    'id_number'=>$id_no,
                    'address' =>$address,
                    'joining_date' =>$joining_date,
                    
                ]);
                log::info($insertemployee);
                if($insertemployee)
                {
                    $id = DB::table('employee')->max('id');//if $insert then return id/////////
                    return $id;
                }else{
                    return null;
                }          

         }         
       
            catch(QueryException $e)
        {
            Log::error('databasequery Trait > add_employee > database error: '.$e->getMessage());
            return null;
        }
        catch(Exception $e)
        {
            Log::error('databasequery Trait > add_employee : '.$e->getMessage());
            return null;
        }

    }
    public static function assigncompany($user_id,$assign_company)
    { 
        try
        {	                 
                $assign_company = DB::table('emp_company_map')->insert([
                    'user_id'=>$user_id,
                    'company_id'=>$assign_company,             
                ]);
                log::info($assign_company);
                if($assign_company)
                {log::info($assign_company);
                    $id = DB::table('emp_company_map')->max('id');//if $insert then return id/////////
                    return $id;
                }else{
                    return null;
                }          

         }         
       
            catch(QueryException $e)
        {
            Log::error('databasequery Trait > add_employee > database error: '.$e->getMessage());
            return null;
        }
        catch(Exception $e)
        {
            Log::error('databasequery Trait > add_employee : '.$e->getMessage());
            return null;
        }

    }

	
            
           
	            
}
