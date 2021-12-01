<?php

// Define some constants
define( "RECIPIENT_NAME", "CALM Contact Form" );
define( "RECIPIENT_EMAIL", "maplink2020@gmail.com" );

// Read the form values
$success = false;
$name = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$age = isset( $_POST['age'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['age'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$state = isset( $_POST['state'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['state'] ) : "";
$country = isset( $_POST['country'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['country'] ) : "";
$organization = isset( $_POST['organization'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['organization'] ) : "";
$profile = isset( $_POST['profile'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['profile'] ) : "";
$radio = isset( $_POST['radio'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['radio'] ) : "";



$mail_subject = 'PFA registeration request send by ' . $name;

$body = 'Name: '. $name . "\r\n";
$body .= 'Email: '. $senderEmail . "\r\n";


if ($phone) {$body .= 'Phone: '. $phone . "\r\n"; }
if ($age) {$body .= 'Age: '. $age . "\r\n"; }
if ($state) {$body .= 'State: '. $state . "\r\n"; }
if ($country) {$body .= 'Country: '.$country . "\r\n"; }
if ($organization) {$body .= 'Organization: '.$organization . "\r\n"; }
if ($profile) {$body .= 'Profile: '.$profile . "\r\n"; }
if ($radio) {$body .= ' Option: '.$radio . "\r\n"; }







// If all values exist, send the email
if ( $name && $senderEmail && $phone ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $name . " <" . $senderEmail . ">";  
  $success = mail( $recipient, $mail_subject, $body, $headers );
  echo "<div class='inner success'><p class='success'>Thanks for contacting us. We will contact you ASAP!</p></div><!-- /.inner -->";
}else {
	echo "<div class='inner error'><p class='error'>Something went wrong. Please try again.</p></div><!-- /.inner -->";
}

?>