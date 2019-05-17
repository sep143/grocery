<?php 
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//require_once dirname(__FILE__) . '/PHPMailer/PHPMailer.php';
//require_once dirname(__FILE__) . '/PHPMailer/Exception.php';
	/**
	 * 
	 */
	class Mailsend
	{
		var $IC;
		function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('email');
               
    }
    
    //mail
    function mail_send_otp($otp, $email) {
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'satish.office2018@gmail.com', // change it to yours
        'smtp_pass' => 'Satish#143', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'priority' => '1',
        'wordwrap' => TRUE
        );
        $subject = "Otp send";
        $message = "Your otp is $otp";
        $this->CI->load->library('email',$config);
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from('satish.office2018@gmail.com', "Advertisement Information");
        $this->CI->email->to($email);
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);
        $this->CI->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->CI->email->set_header('Content-type', 'text/html');
        $this->CI->email->send();
    }
    
    //core mail function
function send_exp_remider($email,$message,$subject){
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        //use PHPMailer\PHPMailer\PHPMailer;
        //use PHPMailer\PHPMailer\Exception;

        // Load Composer's autoloader
        //require 'vendor/autoload.php';
        //require 'PHPMailer/Exception.php';
        //require 'PHPMailer/PHPMailer.php';
        //require 'PHPMailer/SMTP.php';
        error_reporting(E_ALL);
        ini_set('display_errors','On');


        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 1;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'localhost';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = false;                                   // Enable SMTP authentication
            $mail->Username   = 'info@yellowvdo.com';                     // SMTP username
            //$mail->Password   = 'secret';                               // SMTP password
            //$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            //$mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('info@yellowvdo.com', 'YellowVDO');
           // $mail->addAddress('ojal@fusionfirst.com', 'Joe User');     // Add a recipient
           // $mail->addAddress('ojal15@gmail.com');
            $mail->addAddress($email);	// Name is optional
            $mail->addReplyTo('info@yellowvdo.com', 'YellowVDO');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body = $message;
            //$mail->Subject = 'Here is the subject '.date("Y-m-d H:i:s");
            //$mail->Body    = 'This is the HTML message body <b>in bold!</b> '.date("Y-m-d H:i:s");
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients. '.date("Y-m-d H:i:s");

            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        //return;
    }
    
    public function mobile_otp_send($otp, $mobile){
        return 'mail send OTP IS-'.$otp.' and mobile no. IS-'.$mobile;
    }
   
}
