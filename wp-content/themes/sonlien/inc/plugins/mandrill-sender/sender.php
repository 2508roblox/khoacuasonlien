<?php
/**
* Plugin Name: Mandrill API Sender
* Plugin URI: 
* Description: A simple plugin
* Version: 1.0
* Author: Tidx
* Author URI: 
**/

require_once('Mandrill.php');

class MandrillSender {
    function __construct($apiKey = null, $fromName, $fromEmail, $proxy = "proxylb.vingroup.net:9090"){
        $this->mandrill = new Mandrill($apiKey, $proxy);
        $this->fromName = $fromName;
        $this->fromEmail = $fromEmail;
    }

    function send($to, $subject, $content, $headers = null){
        try {
            $message = array(
                'html' => $content,
                'subject' => $subject,
                'from_email' => $this->fromEmail,
                'from_name' => $this->fromName,
                'to' => $to,
                // 'to' => array(
                //     array(
                //         'email' => 'recipient.email@example.com',
                //         'name' => 'Recipient Name',
                //         'type' => 'to'
                //     )
                // ),
                'headers' => $headers,
                'important' => false,
                'track_opens' => null,
                'track_clicks' => null,
                'auto_text' => null,
                'auto_html' => null,
                'inline_css' => null,
                'url_strip_qs' => null,
                'preserve_recipients' => null,
                'view_content_link' => null,
                'tracking_domain' => null,
                'signing_domain' => null,
                'return_path_domain' => null,
                'merge' => true,
                'merge_language' => 'mailchimp',
            );
            $async = false;
            $result = $this->mandrill->messages->send($message, $async, null, null);
            return $result;
            /*
            Array
            (
                [0] => Array
                    (
                        [email] => recipient.email@example.com
                        [status] => sent
                        [reject_reason] => hard-bounce
                        [_id] => abc123abc123abc123abc123abc123
                    )
            
            )
            */
        } catch(Mandrill_Error $e) {
            return array(
                'errClass' => get_class($e),
                'errMessage' => $e->getMessage(),
            );
        }
    }
}

// $sender = new MandrillSender('cWjderlnxHZ6pJUgDHDx3w', 'TimeVN', 'info@timevn.com');
// $resp = $sender->send(array(
//     array(
//         'email' => 'trungduy1995nd@gmail.com',
//         'name' => 'Recipient Name',
//         'type' => 'to'
//     )
// ), 'test email from timevn', '<p>this <b>is</b> test!');
// var_dump($resp);
?>