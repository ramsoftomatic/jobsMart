<!DOCTYPE html>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Welcome</title>
	</head>
	

<body>

    <div style=" margin: auto;width: 60%;border: 3px solid #90d75d;padding: 10px;box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <div style="background-color:#60d158;">
            <img src="https://dearsociety.in/login/images/mail/logo.png">
            <h3 style="   
            padding: 10px;
            text-align: right;
            padding-top: 2px;
            color: #fff;
            margin: 0;
            float: right;
            width: 55%;
            font-size: 26px;
            font-family: 'arial narrow';">{{$society_name}}</h3>
        </div>

        <div class="content">
            <h4 style="font-family:'Trebuchet MS',Geneva,sans-serif;margin:24px 0;">Notice - {{$subject}}</h4>
            <p style="font-family:'Trebuchet MS',Geneva,sans-serif;margin:10px 0;">Dear {{$designation}},</p>
            <p style="font-family:'Trebuchet MS',Geneva,sans-serif;margin:10px 0; text-align: justify;"><?php echo nl2br($mail); ?></p>
            <div style="text-align:center;">
                <img  class="img-responsive" src="https://dearsociety.in/login/images/mail/ad.jpg">
            </div>
            <div style="width: max-content;
            margin: unset;
            float: left;">
                <p><strong>Thank You</strong>
                    <br>
                    Warm Regards
                    <br>
                    Admin, {{$society_name}}
                </p>
            </div>
            <div style="width: max-content;
            float: right; 
           " class="sicon">
                <p style="display:inline-flex;">Follow us on |&nbsp; <a href="#"><img src="https://dearsociety.in/login/images/mail/ficon.png"></a>&nbsp;
                    <a href="#"><img src="https://dearsociety.in/login/images/mail/yicon.png"></a></p>
            </div>
        </div>


        <div style="   margin-top: 80px;  text-align: justify;background-color:#3f545c;padding:6px;">
            <p style="margin:0;color:#CCC;">Disclaimer: Dearsociety offers a private and password protected space for
                your society community.
                Your data is stored safely in our secure data centers and would not be shared with any third party.</p>
        </div>

    </div>

</body>

</html>