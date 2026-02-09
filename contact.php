<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // CHANGE THIS
  $to = "yourname@yourdomain.com";

  $subject = "New contact form submission";

  $name = strip_tags($_POST["name"] ?? "");
  $email = filter_var($_POST["email"] ?? "", FILTER_SANITIZE_EMAIL);
  $message = strip_tags($_POST["message"] ?? "");

  $headers  = "From: Website Contact <contact@yourdomain.com>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  $body  = "New message from your website:\n\n";
  $body .= "Name: $name\n";
  $body .= "Email: $email\n\n";
  $body .= "Message:\n$message\n";

  mail($to, $subject, $body, $headers);

  // Simple success message
  echo "Thank you — your message has been sent.";
}
?>
