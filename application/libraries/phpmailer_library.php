<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    class Phpmailer_library
    {
        public function __construct()
        {
            log_message('Debug', 'PHPMailer class is loaded.');
        }
        public function load()
        {
            require_once APPPATH.'third_party/Mailer/Exception.php';
            require_once APPPATH.'third_party/Mailer/PHPMailer.php';
            require_once APPPATH.'third_party/Mailer/SMTP.php';
            $objMail = new PHPMailer;
            return $objMail;
        }
    }
    
 ?>