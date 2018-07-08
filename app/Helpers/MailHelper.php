<?php
namespace App\Helpers;

use Mail;

class MailHelper {
    
    const MAIL_DRIVER = 'smtp';
    const MAIL_HOST = 'smtp.gmail.com';
    const MAIL_PORT = '587';
    const MAIL_USERNAME = 'thaivuong1503@gmail.com';
    const MAIL_PASSWORD = 'thaivuonglegiang9092';
    const MAIL_ENCRYPTION = 'tls';
    const FROM_MAIL = 'admin@cms.local';
    const FROM_MAIL_NAME = 'CMS Admin';
    
    /**
     * sendMail
     * @param Array $config
     * @return boolean
     */
    public static function sendMail($config) {
        $from = isset($config['from'])?$config['from']:'';
        $from_name = isset($config['from_name'])?$config['from_name']:'';
        $to = isset($config['to'])?$config['to']:'';
        $subject = isset($config['subject'])?$config['subject']:'';
        $data = isset($config['data'])?$config['data']:'';
        $template = isset($config['template'])?$config['template']:'';
        $cc = isset($config['cc'])?$config['cc']:null;
        $bcc = isset($config['bcc'])?$config['bcc']:null;
        $pathToFile = isset($config['pathToFile'])?$config['pathToFile']:null;
        
        try {
            
        Mail::send($template, ['data' => $data], function ($email) use ($from, $from_name, $to, $subject, $cc, $bcc, $pathToFile) {
                if ($from_name != '') {
                    $email->from($from, $from_name);
                } else {
                    $email->from($from, $from);
                }
                $email->to($to);
                if ($cc !== null) {
                    $email->cc($cc);
                }
                if ($bcc !== null) {
                    $email->bcc($bcc);
                }
                if ($pathToFile !== null) {
                    $email->attach($pathToFile);
                }
                $email->subject($subject);
            });
        
        } catch (\Exception $e) {
            return false;
        }
            
        return true;
    }
    
}