<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Welcome</title>
</head>

<body>


<div style=" margin: auto;border: 3px solid rgb(7, 36, 103);padding: 10px;box-shadow:solid rgb(7, 36, 103);">

     
    <div class="content">
        <table width='500' align='center' cellpadding='0' cellspacing='0' style='border-top: 50px solid rgb(7, 36, 103);'>
        <tr><td>
        <table width='500' cellpadding='5' cellspacing='5' style='background-color: #ececec; '>
        <tr>
        <td align='center'><b><h2 style='color:rgb(32, 33, 32)'>Submit Resume</h2></b><hr style='color:#7fa67a'>
        </td>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b> Name : </b> {{$first_name}} {{$last_name}}<br></td>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Contact No : </b>{{$phone}}  <br></td>
        </tr>
       <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Email : </b> {{$email_id}}  <br></td>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Date Of Birth : </b> {{$dob}} <br></td>
        </tr>

        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current State : </b> {{$curr_state}} <br></td>
        </tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current City : </b> {{$curr_city}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Area : </b> {{$curr_area}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Preferred State : </b> {{$pref_state}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Preferred City : </b> {{$pref_city}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Gender: </b> {{$gender}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Work Experience : </b> {{$work_exp}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Annual Salary : </b> {{$curr_annual_salary}} <br></td></tr>

        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Job Title : </b> {{$curr_job_title}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Functional Area : </b> {{$curr_functional_area}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Current Industry : </b> {{$curr_industry}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Years in Current Job : </b> {{$years_cjobs}} <br></td></tr>
        <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>Highest Education Leve : </b> {{$education}} <br></td></tr>
       <tr><td style='text-align:justify; color:rgb(32, 33, 32); font-size:16px'>
        <b>resume : </b> <a href='https://www.jobsmartindia.com/admin/{{$resume_file}}' target='_blank'>{{$resume_file}}</a> <br></td>
        </tr>
        
      
        </table>
        </td></tr>
        </table>
        <p><strong>Thank you</strong> 
            <br>
            Warm Regards,
            <br>
           Jobs Mart India
        </p>
    </div>
</div>


</body>
</html>


