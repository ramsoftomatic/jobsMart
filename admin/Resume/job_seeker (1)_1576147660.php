<?php include ('header.php'); ?>
<?php
include('dbinfo.php');



// $pagename="job_seeker";
// $table="jobdetail";
// $primarykey="id"
// ?>


//  <?php
// $errors=0;


// function getExtension($str)
// {
// 	 $i = strrpos($str,".");
// 	 if (!$i) { return ""; }
// 	$l = strlen($str) - $i;
// 	$ext = substr($str,$i+1,$l);
// 	 return $ext;
// }




// if(isset($_POST['submit']))
//     {
	
// 		$specialized_service=$_POST['specialized_service'];
// 		$highest_qualification=$_POST['highest_qualification'];
// 		if($_POST['additional_certification']!='')
// 		{
// 		$additional_certification=$_POST['additional_certification'];
// 		}
// 		else{
// 			$additional_certification="";
// 		}
// 		$first_name=$_POST['first_name'];
// 		$last_name=$_POST['last_name'];
// 		$email_id=$_POST['email_id'];
// 		$dob=$_POST['dob'];
// 		$phone=$_POST['phone'];
// 		$address1=$_POST['address1'];
// 		$address2=$_POST['address2'];
// 		$state=$_POST['state'];
// 		$city=$_POST['city'];
// 		$zip_code=$_POST['zip_code'];
// 		$fname=$_FILES['image']['name'];
// 	    $tname=$_FILES['image']['tmp_name'];
// 	    $uploadfolder = "Resume";
// 	    $filename = stripslashes($_FILES['image']['name']);
// 		$extension = getExtension($filename);
// 		$extension = strtolower($extension);
		
		 
// 			if (($extension != "pdf") && ($extension != "doc") && ($extension != "docx") && ($extension!="xlsx") &&($extension != "jpg")  && ($extension != "png")  && ($extension != "gif")) 
// 			{
// 		 		'<script language="javascript">';
// 				'alert("Unknown extension!")';
// 				 '</script>';
// 				$errors=1;
// 			}
// 			else
// 			{
// 				$errors=0;
				
					
// 					echo	$q="insert into $table(specialized_service,highest_qualification,additional_certification,first_name,last_name,email_id,dob,phone,address1,address2,state,city,zip_code,upload_resume) values ('$specialized_service','$highest_qualification','$additional_certification','$first_name','$last_name','$email_id','$dob','$phone','$address1','$address2','$state','$city','$zip_code','$extension')";
// 						$res=mysql_query($q);
// 						if(move_uploaded_file($tname,"$uploadfolder/".$email_id.".".$extension) || $res)
// 								{
					
// 								echo '<script>alert("update successfully");
// 								window.location.replace("job_seeker.php");
// 								</script>';
// 								}
// 							else
// 								{
// 									echo '<script>alert("upload unsuccessfully");"</script>';
// 								}
					
					
// 		    	}
			
// 	    	}






?>
<?php 
if (isset($_POST['submit'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $dob=$_POST['dob'];
    $phone=$_POST['phone'];
    $email_id=$_POST['email_id'];
    $curr_state=$_POST['curr_state'];
    $curr_city=$_POST['curr_city'];
    $curr_area=$_POST['curr_area'];
    $pref_state=$_POST['pref_state'];
    $pref_city=$_POST['pref_city'];
    $pref_area=$_POST['pref_area'];
    $gender=$_POST['gender'];

    $work_exp=$_POST['work_exp'];
    $curr_annual_salary=$_POST['curr_annual_salary'];
    $curr_job_title=$_POST['curr_job_title'];
    $curr_functional_area=$_POST['curr_functional_area'];
    $curr_industry=$_POST['curr_industry'];
    $curr_job_years=$_POST['curr_job_years'];
    $high_edu_level=$_POST['high_edu_level'];
 
  
    $msg="";
    $message = "<html>
        <body>
        <table width='500' align='center' cellpadding='0' cellspacing='0' style='border-top: 50px solid rgb(7, 36, 103);'>
        <tr><td>
        <table width='500' cellpadding='5' cellspacing='5' style='background-color: #ececec; '>
        <tr>
        <td align='center'><b><h2 style='color:rgb(32, 33, 32)'>Submit Resume</h2></b><hr style='color:#7fa67a'>
        </td>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b> Name : </b> $first_name $last_name<br>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Contact No : </b>$phone  <br>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Email : </b> $email_id  <br>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Phone : </b> $phone <br>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current State : </b> $curr_state <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current City : </b> $curr_city <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Area : </b> $curr_area <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Preferred State : </b> $pref_state <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Preferred City : </b> $pref_city <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Preferred Area : </b> pref_area <br>

        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Gender: </b> $gender <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Work Experience : </b> $work_exp <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Annual Salary : </b> $curr_annual_salary <br>

        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Job Title : </b> $curr_job_title <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Functional Area : </b> $curr_functional_area <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Industry : </b> $curr_industry <br>

        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Years in Current Job : </b> $curr_job_years <br>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Highest Education Leve : </b> $high_edu_level <br>
         
        </tr>
        
      
        </table>
        </td></tr>
        </table></body></html>";
        
require ('PHPMailer/PHPMailerAutoload.php');

    $host_name='smtp.gmail.com';
   $username='mailer@5elements.org.in';
    $password= 'qazWSX546@';
    $port= '587';
    $subject="$high_edu_level/$curr_job_years/$curr_city/$phone/$first_name $last_name - Applied";
    $mail = new PHPMailer;
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = $host_name;                             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = "$username";                          // SMTP username
    $mail->Password ="$password";                           // SMTP password
    if($port=='465'){
        $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `tls` also accepted
    }else{
        $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
    }
    $mail->Port = "$port";                                  // TCP port to connect to

    $mail->SetFrom($username,'Contact us');
    $email ='hr@jobsmartindia.com';
  
    $name = 'Jobs Mart';
    $mail->AddAddress($email, $name);
    $mail->Subject = $subject;
    $mail->MsgHTML($message);
   
    if($mail->Send()){
    echo "<script>
alert('Thank you for your message');
window.location.replace('job_seeker.php');
</script>";
   }
}
else{
  

}
?>
 
 
<div class="services-breadcrumb">
  <div class="container">
    <div class="inner_breadcrumb">
      <ul class="short_ls">
        <li><a href="index.php">Home</a><span>| |</span></li>
        <li>Job Seeker</li>
      </ul>
    </div>
  </div>
</div>

<div class="about-sec" id="about">
  <div class="container">
    <div class="title-div">
      <h3 class="tittle"><span>S</span>ubmit<span> R</span>esume</h3>
      <div class="tittle-style"></div>
    </div>
    <div class="about-sub">
      <div id="jmi" class="col-md-8 about_bottom_left">
        <form action="job_seeker.php" method="POST" enctype="multipart/form-data">

          <!-- <div class="row">
            <div class="col-md-12 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Specialized Service</label>
                <span style="color:red; font-size:14px">*</span>
                <select class="form-control input-lg" name="specialized_service" id="specialized">
                  <option>Select</option>
                  <option>Temporary Accounting & Finance</option>
                  <option>Full Time Accounting & Finance</option>
                  <option>Interim Project-based Financial</option>
                  <option>Office & Administrative</option>
                  <option>Technology & IT</option>
                  <option>Creative & Marketing</option>
                  <option>Legal</option>
                </select>
              </div>
            </div>
            
          </div>
           -->
          <!-- <div class="row">
          <div class="col-md-6 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Highest Qualification</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="highest_qualification" id="qualification" onkeyup="highest_qua()" class="form-control input-lg">
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Additional Certification</label>

                <input type="text" name="additional_certification" id="certification" class="form-control input-lg">
              </div>
            </div>
            
          </div> -->
         
          <div class="row">
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="first_name" id="name" onkeyup="fname()" class="form-control input-lg" required="required">
              </div>
            </div>
            
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="last_name" id="last_name" onkeyup="lastname()" class="form-control input-lg">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="phone" id="phone" onkeyup="mobileNo()" class="form-control input-lg" required="required">
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="exampleInputEmail1">DOB</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="date" name="dob" id="dob" class="form-control input-lg " required="required">
              </div>
            </div>            
          </div>
          <div class="row">
            <div class="col-md-12 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Email Id</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="email" name="email_id" id="email" class="form-control input-lg" required="required">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-12">
              <br>
              <h3>Current Location</h3>
              <br>
            </div>
            <br>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">State</label>
                <span style="color:red; font-size:14px">*</span>
                <select class="form-control input-lg" name="curr_state" onfocus="curr_state()" id="curr_state" onchange="selct_district(this.value);">
                  <option>Select State</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="form-group">
                <label for="exampleInputEmail1">City</label>
                <span style="color:red; font-size:14px">*</span>
                <select class="form-control input-lg" onfocus="curr_city()" name="curr_city" id="curr_city">
                  <option>Select City</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Area</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="curr_area" id="curr_area" class="form-control input-lg" placeholder="e.g. Andheri, Dadar">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <br>
              <h3>Preferred Location</h3>
              <br>
            </div>
            <br>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">State</label>
                <span style="color:red; font-size:14px">*</span>
                <select class="form-control input-lg" name="pref_state" onfocus="pref_state()" id="pref_state" onchange="selct_district_pref(this.value);">
                  <option>Select State</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="form-group">
                <label for="exampleInputEmail1">City</label>
                <span style="color:red; font-size:14px">*</span>
                <select class="form-control input-lg" onfocus="pref_city()" name="pref_city" id="pref_city">
                  <option>Select City</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="form-group">
                <label for="exampleInputEmail1">Area</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="pref_area" id="pref_area" class="form-control input-lg" placeholder="e.g. Andheri, Dadar">
              </div>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Gender</label>
                <span style="color:red; font-size:14px">*</span>
                <select class="form-control input-lg" name="gender" id="gender">
                  <option>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Total Work Exp</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="work_exp" id="work_exp" class="form-control input-lg">
              </div>
            </div>          
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Annual Salary</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="curr_annual_salary" id="curr_annual_salary" class="form-control input-lg">
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Job Title</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="curr_job_title" id="curr_job_title" class="form-control input-lg">
              </div>
            </div>  
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Functional Area</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="curr_functional_area" id="curr_functional_area" class="form-control input-lg">
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Current Industry</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="curr_industry" id="curr_industry" class="form-control input-lg">
              </div>
            </div>  
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Years in Current Job</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="curr_job_years" id="curr_job_years" class="form-control input-lg">
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Highest Education Level</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="text" name="high_edu_level" id="high_edu_level" class="form-control input-lg">
              </div>
            </div>  
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Upload Your Resume</label>
                <span style="color:red; font-size:14px">*</span>
                <input type="file" name="image" id="resume" class="form-control input-lg" required="required">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-offset-3 col-md-6 ">
              <div class="form-group">
                <input type="submit" name="submit" id="submitdetails" class="btn btn-lg btn-info" onsubmit="validation.js"
                  value="SUBMIT DETAILS">
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </form>
      </div>

      <div id="jmi" class="col-md-4 about_bottom_left">
      	<h4><span>C</span>urrent <span>O</span>penings</h4>
        <hr>
        <p>Your dream job is a <a href="current_openings.php"><span>click away</span></a> !!</p>
        <br>
        <br><br>
        
        <h4><span>L</span>et <span>u</span>s <span>h</span>elp <span>t</span>o <span>m</span>ake <span>y</span>our <span>r</span>esume</h4>
        <hr>
          <p><span>First Impression matters</span> - A Lot. You get one only <span>chance</span> to make first impression. 
          <a href="contact_us.php">Contact us</a> to get an edge with professionally written Resume.</p><br>
            
        <br><br>
        
        <h4><span>D</span>os and <span>D</span>on't</h4>
        <hr>
            <a href="#"><button style="background-color:#1800e2;" type="button" class="btn btn-primary">Read More</button></a>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript" src="js/state.js"></script>
<script type="text/javascript" src="js/pref_state.js"></script>
<script type="text/javascript" src="js/validation.js"></script>
<?php include ('footer.php'); ?>
