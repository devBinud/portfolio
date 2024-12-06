<?php
// Replace with your receiving email address
$receiving_email_address = 'devbinud@gmail.com'; // Your email here

// Include the PHP Email Form library
if( file_exists($php_email_form = '../assets/vendor/php-email-form/validate.php' )) {
    include( $php_email_form );
} else {
    die( 'Unable to load the "PHP Email Form" Library!');
}

// Create a new instance of the PHP_Email_Form class
$contact = new PHP_Email_Form;
$contact->ajax = true;  // Enable AJAX for form submission

// Set the email details
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];  // Form input: Name
$contact->from_email = $_POST['email'];  // Form input: Email
$contact->subject = $_POST['subject'];  // Form input: Subject

// Add form message content
$contact->add_message($_POST['name'], 'From');  // Name field
$contact->add_message($_POST['email'], 'Email');  // Email field
$contact->add_message($_POST['message'], 'Message', 10);  // Message field with max length of 10

// Uncomment below if you want to use SMTP to send the email
/*
$contact->smtp = array(
    'host' => 'smtp.example.com',
    'username' => 'your-username',
    'password' => 'your-password',
    'port' => '587'
);
*/

// Send the email
echo $contact->send();
?>
