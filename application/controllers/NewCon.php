<?php
class NewCon extends CI_Controller{

    function  __construct(){
        parent::__construct();
    }

    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_library');

        // PHPMailer object
        $mail = $this->phpmailer_library->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'ssl://smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'solutions.web2019@gmail.com';
        $mail->Password = 'Goodnight88';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('support@masterclap.in', 'CodexWorld');
        $mail->addReplyTo('support@masterclap.in', 'CodexWorld');

        // Add a recipient
        $mail->addAddress('wmsn.web@gmail.com');

        // Add cc or bcc 
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }

}