<?php
namespace App\Helpers;

class CommonHelpers {
    
    /**
     * sendMail
     * @param Array $config
     * @return boolean
     */
    public function sendMail($config) {
        $from = isset($config['from'])?$config['from']:'';
        $from_name = isset($config['from_name'])?$config['from_name']:'';
        $to = isset($config['to'])?$config['to']:'';
        $subject = isset($config['subject'])?$config['subject']:'';
        $msg = isset($config['msg'])?$config['msg']:'';
        $template = isset($config['template'])?$config['template']:'';
        $cc = isset($config['cc'])?$config['cc']:null;
        $bcc = isset($config['bcc'])?$config['bcc']:null;
        $pathToFile = isset($config['pathToFile'])?$config['pathToFile']:null;
        
        Mail::send($template, $msg, function ($email) use ($from, $from_name, $to, $subject, $cc, $bcc, $pathToFile) {
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
            
        return true;
    }
    
}