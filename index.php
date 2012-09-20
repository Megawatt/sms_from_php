<!DOCTYPE html>
<html>
<head>
  <title>Send SMS Demo</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <style type="text/css">
    body
        {
        background-color:#b6b6b6;
	font-family:Arial, Helvetica, sans-serif;
	margin:0 auto;
	padding:0;
        }
    .main
        {
        width: 760px;
        background-color:#e6e6e6;
        margin:0 auto;       
	padding:20px 0;
        }
    h1
	{
	background-color:#000088;
	color:#EEEEEE;
	font-size:2em;
	margin:0;
	padding-left:100px;
	}
    table
	{
	width: 400px;
	margin-left:100px;
	margin-top: 20px;
	text-align:left;
	padding:10px 20px 10px 20px;
	background-color:#D0D0D0;
	}
     p
	{
	margin-left:100px;
	}
     .formlabel
	{
	text-align:right;
	}
     .inputfield
	{
	font-size:12pt;
	width:300px;
	}
     .submitbutton
	{
	text-align:left;
	vertical-align:middle;
	}
  </style>
</head>

<body>
  <div class="main">
         <h1>Send a Text Message from PHP Demo</h1>
	 <form name="sms" method="post" action="index.php">
	  <table>
	   <tr>
	     <td class="formlabel" >From:</td>
	     <td class="inputfield"><input name="from" type="text" class="inputfield" size="40" /></td>
	   </tr>
	   <tr>
	     <td class="formlabel">To:</td>
	     <td><input name="to" type="text" class="inputfield" size="40" /></td>
	   </tr>
	   <tr>
	     <td class="formlabel">Carrier:</td>
	     <td><select name="carrier">
		<option value="att"    >AT&amp;T     </option>
		<option value="verizon">Verizon      </option>
		<option value="tmobile">T-Mobile     </option>
		<option value="sprint" >Sprint       </option>
		<option value="virgin" >Virgin Mobile</option>
	     </select></td>
	   </tr>
	   <tr>
	     <td class="formlabel">Message:</td>
	     <td><textarea name="message" cols="40" rows="5" class="inputfield" ></textarea></td>
	   </tr>
	   <tr>
	     <td></td>
	     <td class="submitbutton"><input type="submit" name="Submit" value="Send" /></td>
	     </tr>
	  </table>
	 </form>
	
	
	<?php
	
	require("class.phpmailer.php");
	require("config.php");

	if(isset($_POST['Submit']))
	  {
	
	  $from    = $_POST['from'];
	  $to      = $_POST['to'];
	  $carrier = $_POST['carrier'];
	  $message = stripslashes($_POST['message']);

	  if ((empty($from)) || (empty($to)) || (empty($message))) 
	     {
	     echo "<p>Missing fields - Message could not be sent.</p>";
	     exit;
	     }
	
	  switch($carrier)
	  {
	    case "att" :
	      $toaddress = $to."@txt.att.net";
	      break;
	    case "sprint" :
	      $toaddress = $to."@messaging.sprintpcs.com";
	      break;
	    case "tmobile" :
	      $toaddress = $to."@tomomail.net";
	      break;
	    case "verizon" :
	      $toaddress = $to."@vtext.com";
	      break;
	    case "virgin" :
	      $toaddress = $to."@vmobl.com";
	      break;
	    default :
	      echo "<p>Unknown carrier - Message could not be sent. </p>";
	      exit;
	      break;
	  }
	
	  $mail = new PHPMailer();
	
	  $mail->IsSMTP();                                   // set mailer to use SMTP
	  $mail->Host     = $SMS_CNF_SMTP_SERVER;            // smtp server. this is set in config.php
	  $mail->From     = $SMS_CNF_ORIGINATOR_ADDRESS;     // originating email address.this is set in config.php
	  $mail->FromName = $from;                           // this is from the user input form
	  $mail->AddAddress($toaddress);                     // and so is this one, the destination phone number    
	  $mail->Subject  = $SMS_CNF_SUBJECT;                // subject, set in config.php, set as fixed
	  $mail->Body     = $message;
	
	  if(!$mail->Send())
	      {
	      echo "<p>Message could not be sent. Mailer Error: ". $mail->ErrorInfo."</p>";
	      exit;
	      }
	  echo "<p>Message has been sent to ".$toaddress.".</p>";
	  }
          else
          {
              echo "<p>Fill out the form and press Send.</p>";
          }
	?>
  </div>
</body>
</html>


