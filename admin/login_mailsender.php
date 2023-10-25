<?php
include('smtp/PHPMailerAutoload.php');
$end_user_email = "newsrecalls@gmail.com";
$subject = "Account Login Notification";
$body = "<b>Namaste Newsrecall Ji</b><br><br>" .
"Your <b>Newsrecall</b> Account was just used to <b>SIGN IN</b> by following information : <br><br><br><br>" .
"<br>Date :- " . date("d M, Y h:i:sa") . "<br> IP Address :- " . getenv("REMOTE_ADDR");

echo smtp_mailer($end_user_email, $subject, $body);
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "newsrecalls@gmail.com";
    $mail->Password = "fssomhirlfssciax";
    $mail->SetFrom("newsrecalls@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );

}
 echo "<script>window.location.href='$hostname/admin/post.php'</script>";
?>