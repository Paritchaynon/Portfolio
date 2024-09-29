<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'azusa205@gmail.com';

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

      // Validate inputs
      if (empty($name) || empty($email) || empty($subject) || empty($message)) {
          echo "Please fill all the fields.";
          exit;
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "Invalid email format.";
          exit;
      }

      // Prepare email content
      $email_content = "Name: $name\n";
      $email_content .= "Email: $email\n\n";
      $email_content .= "Message:\n$message\n";

      // Set email headers
      $headers = "From: $name <$email>\r\n";
      $headers .= "Reply-To: $email\r\n";

      // Send email
      if (mail($receiving_email_address, $subject, $email_content, $headers)) {
          echo "OK";
      } else {
          echo "Failed to send email. Please try again later.";
      }
  } else {
      echo "Invalid request method.";
  }
?>
