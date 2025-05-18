<?php
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  if(isset($_POST['recaptcha-response'])) {
    $recaptcha_response = $_POST['recaptcha-response'];
    $secret_key = '6LfKkSsrAAAAACHwpYgvk5clAEffgHMBh8ucLmHh';
    $verify_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $recaptcha_response;
    $verify_response = file_get_contents($verify_url);
    $response_data = json_decode($verify_response);
    if(!$response_data->success) {
      die('Recaptcha failed.');
    }
  } else {
    die('Recaptcha not found.');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  $contact->smtp = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'port' => '587'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
