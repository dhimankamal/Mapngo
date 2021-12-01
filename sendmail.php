<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
$alert='';
if (isset($_POST['sendbtn'])){
   $name = $_POST['name'];
   $dob = $_POST['dob'];
   $gender = $_POST['gender'];
   $education = $_POST['education'];
   $profession = $_POST['profession'];
   $qualification = $_POST['qualification'];
   $interest = $_POST['interest'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $state = $_POST['state'];
   $district = $_POST['district'];
   $city = $_POST['city'];


   

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "info@mapngo.org";
$mail->FromName = "MAP NGO";

//To address and name
$mail->addAddress("maplink2020@gmail.com", "Recepient Name");


//Address to which recipient will reply
$mail->addReplyTo("info@mapngo.org", "Reply");

//CC and BCC
$mail->addCC("cc@mapngo.org");
$mail->addBCC("bcc@mapngo.org");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text Test";
$mail->Body = "<h1>To Become a Member</h1>
<br>
Name = ".$name."<br>Date Of Birth = ".$dob."<br>Gender = ".$gender."<br>Education = ".$education."<br>Proffession = ".$profession."<br>
Qualification = ".$qualification."<br>Interest = ".$interest."<br>Phone = ".$phone."<br>Email = ".$email."<br>State = ".$state."<br>District = ".$district."<br>City = ".$city;
$mail->AltBody = "Member Deatil";
if (isset($_FILES['attachment']) &&
    $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['attachment']['tmp_name'],
                         $_FILES['attachment']['name']);
}
if (isset($_FILES['attachment2']) &&
    $_FILES['attachment2']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['attachment2']['tmp_name'],
                         $_FILES['attachment2']['name']);
}


try {
    $mail->send();
    $alert = "Your Member Request Submited Successfully";
} catch (Exception $e) {
   $alert = "Mailer Error: " . $mail->ErrorInfo;
}



?>
<div class="alert alert-success" role="alert">
                               <?php echo $alert ?>
                              </div>
<?php
}