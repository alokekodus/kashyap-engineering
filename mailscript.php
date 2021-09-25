<?php

require("mail/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "mail.kashyapengineering.in";
$mail->Username = "support@kashyapengineering.in";
$mail->Password = "P@55w0rd123";

$mail->AddAddress("pranjal.deb@ekodus.com", "Support");
$mail->SetFrom($_POST["email"], $_POST["name"]);
$mail->AddReplyTo($_POST["email"], $_POST["name"]);

// $mail->AddReplyTo($_POST["email"], $_POST["name"]);

$mail->IsHTML(true);
$MESSAGE_BODY = "Name: ".check_input($_POST["name"])."<br/>"; 
$MESSAGE_BODY .= "Email: ".check_input($_POST["email"])."<br/>"; 
$MESSAGE_BODY .= "Phone Number: ".check_input($_POST["phone"])."<br/>"; 
$MESSAGE_BODY .= "Message: ".check_input($_POST["message"])."<br/>";


$mail->Subject = "Contact Form";
$mail->Body = $MESSAGE_BODY;


if(!$mail->Send())
{
   $return['msgType']=false;
   $return['msg']=$mail->ErrorInfo;
   echo json_encode($return);
}else{
   $return['msgType']=true;
   $return['msg']="Message has been sent";
   echo json_encode($return);
}




function check_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// $mail = new PHPMailer(); // create a new object
// $mail->IsSMTP(); // enable SMTP
// $mail->Mailer = "smtp";
// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
// $mail->SMTPAuth = true; // authentication enabled
// // $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
// // $mail->Host = "smtp.gmail.com";
// $mail->SMTPSecure = 'ssl';
// $mail->Host = 'ssl://smtp.gmail.com';
// $mail->Port = 465; // or 587 465
// $mail->IsHTML(true);
// $mail->Username = "pranjaldeb360@gmail.com";
// $mail->Password = "360761263607612";
// $mail->SetFrom("pranjaldeb360@gmail.com");
// $mail->Subject = "Test";
// $mail->Body = "hello";
// $mail->AddAddress("email@gmail.com");

//  if(!$mail->Send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
//  } else {
//     echo "Message has been sent";
//  }
?>