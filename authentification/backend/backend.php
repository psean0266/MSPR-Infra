<?php
require "../PHPMailer-5.2-stable/PHPMailerAutoload.php";
include '../connexion/connect.php' ;
session_start();

function smtpmailer($to, $from, $from_name, $subject, $body)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true; 

    $mail->SMTPSecure = 'ssl'; 
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;  
    $mail->Username = 'zougarm214@gmail.com';
    $mail->Password = 'AQWzsx28@@';

//   $path = 'reseller.pdf';
//   $mail->AddAttachment($path);

    $mail->IsHTML(true);
    $mail->From="zougarm214@gmail.com";
    $mail->FromName=$from_name;
    $mail->Sender=$from;
    $mail->AddReplyTo($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send())
    {
        $error ="Please try Later, Error Occured while Processing...";
        return $error; 
    }
    else 
    {
        $error = "Thanks You !! Your email is sent.";  
        return $error;
    }
  }
    $to   = $_SESSION['Usermail'];
    $from = 'zougarm214@gmail.com';
    $name = 'CHATELET';
    $subj = 'connecxion';
    $msg = '<style type="text/css">
    body{background-color: #88BDBF;margin: 0px;}
    </style>
    <body>
    <table border="0" width="50%" style="margin:auto;padding:30px;background-color: #F3F3F3;border:1px solid #FF7A5A;">
    <tr>
    <td>
    <table border="0" width="100%">
    <tr>
    <td>
    <img src="https://lh3.googleusercontent.com/tyDSzUFBPjs56joJtFIjuUnLocN9DZh6KNh9Bgc5pMco4iJlb7MY7Uwyc2PgA83kDGJHLxrNH7LYOsUNNNXWYp9IJLUmg3AirKeljYIN6Vwg1K4UKprsZAU4KWHABQ2kDg=w1280">
    </td>
    <td>
    
    </td>
    </tr>
    </table>
    </td>
    </tr>
    <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" style="text-align:center;width:100%;background-color: #fff;">
    <tr>
    <td style="background-color:#FF7A5A;height:100px;font-size:50px;color:#fff;"><i class="fa fa-envelope-o" aria-hidden="true"></i></td>
    </tr>
    <tr>
    <td>
    <h1 style="padding-top:25px;">Email Confirmation de connexion</h1>
    </td>
    </tr>
    <tr>
    <td>
    <p style="padding:0px 100px;">
    Lorem ipsum dolor sit amet, consectetur
    adipisicing elit, sed do eiusmod
    tempor incididunt ut lafficia deserunt
    mollit anim id est laborum.
    </p>
    </td>
    </tr>
    <tr>
    <td><a href="http://localhost/authentification/dash.php" style="margin:10px 0px 30px 0px;border-radius:4px;padding:10px 20px;border: 0;color:#fff;background-color:#FF7A5A; ">connexion</a>
   </td>
    </tr>
    </table>
    </td>
    </tr>
    <tr>
    <td>
    <table border="0" width="100%" style="border-radius: 5px;text-align: center;">
    <tr>
    <td>
    <div style="margin-top: 20px;">
    <span style="font-size:12px;">Chatelet</span><br>
    <span style="font-size:12px;">Copyright © CHATELET</span>
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    </body>';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
          $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
      }
   
    
?>


<html>
    <head>
        <title>PHPMailer 5.2 testing from DomainRacer</title>
    </head>
    <body style="background: black;">
        <center><h2 style="padding-top:70px;color: white;"><?php echo $error ?></h2></center>
    </body>
    
</html>