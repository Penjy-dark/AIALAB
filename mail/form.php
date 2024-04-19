<?php
// Check for empty fields
if(isset($_POST)) {
   if (empty($_POST['name']) ||
       empty($_POST['email']) ||
       empty($_POST['message'])
   ) {
      header('HTTP/1.1 400 Internal Server Bad Error');
      header('Content-Type: application/json; charset=UTF-8');
      die(json_encode(array('message' => 'One or more arguments missing', 'code' => 1337)));
   }

   $name = strip_tags(htmlspecialchars($_POST['name']));
   $email_address = strip_tags(htmlspecialchars($_POST['email']));
   $message = strip_tags(htmlspecialchars($_POST['message']));

   $to = 'info@AIALAB.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
   $email_subject = "Website Contact Form:  $name";
   $email_body = "You have received a new message from the client.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message\n\n";
   $headers = "From: noreply@AIALAB.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
   $headers .= "Reply-To: $email_address";
   mail($to, $email_subject, $email_body, $headers);
   return true;
}else{
   return false;
}
?>

