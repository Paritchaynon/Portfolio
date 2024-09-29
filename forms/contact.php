<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'azusa205@gmail.com';

  // Check if the required library exists
  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  // Initialize the form
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'] ?? '';
  $contact->from_email = $_POST['email'] ?? '';
  $contact->subject = $_POST['subject'] ?? '';

  // SMTP configuration
  // IMPORTANT: Move these credentials to a separate, secure configuration file
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'azusa205@gmail.com',
    'password' => 'xtul tzjb oqqw rdco',
    'port' => '587'
  );

  // Add form messages
  $contact->add_message($_POST['name'] ?? '', 'From');
  $contact->add_message($_POST['email'] ?? '', 'Email');
  $contact->add_message($_POST['message'] ?? '', 'Message', 10);

  // Send the email and capture the result
  $send_result = $contact->send();

  // Return the result as JSON
  header('Content-Type: application/json');
  echo json_encode(['success' => $send_result]);
?>
