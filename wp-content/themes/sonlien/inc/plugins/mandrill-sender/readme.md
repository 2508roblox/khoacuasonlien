<?php
$sender = new MandrillSender('API_KEY', 'from_name', 'from_email');
$result = $sender->send($to, $subject, $content, $headers);

?>
//Results
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
//Error
array(
    'errClass' => get_class($e),
    'errMessage' => $e->getMessage(),
)