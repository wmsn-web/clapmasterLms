<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Phpmailer_library
{
public function __construct(){
    log_message('Debug', 'PHPMailer class is loaded.');
}

public function load(){
    // Include PHPMailer library files
    require_once APPPATH.'third_party/vendor/autoload.php';
    

    $mail = new PHPMailer(true);
    return $mail;
}

}
