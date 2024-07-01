<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

class Mailer
{
    private $mailer;

    public function __construct()
    {
        $config = require '../app/config/email.php';

        $this->mailer = new PHPMailer(true);

        // Server settings
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = $config['encryption'];
        $this->mailer->Port = $config['port'];

        // Sender info
        $this->mailer->setFrom($config['from_email'], $config['from_name']);
    }

    public function send($to, $subject, $body, $isHtml = true)
    {
        try {
            // Recipient
            $this->mailer->addAddress($to);

            // Content
            $this->mailer->isHTML($isHtml);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            $this->mailer->send();

            return true;
        } catch (Exception $e) {
            error_log('Message could not be sent. Mailer Error: ' . $this->mailer->ErrorInfo);
            return false;
        }
    }
}
