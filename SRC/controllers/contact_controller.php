<?php

// si les inputs ne sont pas vides
if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    
    // sécurisation des inputs grâce à la fonction test_input
    $firstname = test_input($_POST['first_name']);
    $lastname = test_input($_POST['last_name']);
    $email = test_input($_POST['email']);
    $message = test_input($_POST['message']);

    
    // envoi du mail
    $to = "rehearsalz.web@gmail.com";
    $subject = 'New message from your web page';
    $headers = "From: ".$firstname." ".$lastname. "\r\n" .
    "Reply-To: ".$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);

    // redirection vers une page de remerciement
    header('location: /?page=thank_you');
    exit();

}

// require view*****
require_once realpath('SRC/views/contact.php');

?>