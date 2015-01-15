<?php
/**
 * EDIT THE VALUES BELOW THIS LINE TO ADJUST THE CONFIGURATION
 * EACH OPTION HAS A COMMENT ABOVE IT WITH A DESCRIPTION
 */
/**
 * Specify the email address to which all mail messages are sent.
 * The script will try to use PHP's mail() function,
 * so if it is not properly configured it will fail silently (no error).
 */
$mailTo     = 'zwang91@uw.edu';

/**
 * Specify the subject of the message
 */
$subject    = 'New message';

/**
 * Set the message that will be shown on success
 */
$successMsg = 'Your message has been sent successfully. We will get back to you soon. Thank You!';

/**
 * Set the message that will be shown if not all fields are filled
 */
$fillMsg    = 'Please fill all fields!';

/**
 * Set the message that will be shown on error
 */
$errorMsg   = 'Hm.. seems there is a problem, sorry!';

/**
 * DO NOT EDIT ANYTHING BELOW THIS LINE, UNLESS YOU'RE SURE WHAT YOU'RE DOING
 */
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
if('POST' === $_SERVER['REQUEST_METHOD']) {
    if(
        !isset($_POST['email']) ||
        !isset($_POST['name']) ||
        !isset($_POST['message']) ||
        empty($_POST['email']) ||
        empty($_POST['name']) ||
        empty($_POST['message'])
    ) {
        echo '<script type="text/javascript">window.parent.alert("' . $fillMsg . '");document.location="?";</script>';
    } else {
        $success = @mail($mailTo, $subject, $_POST['message'], 'From: ' . $_POST['name'] . '<' . $_POST['email'] . '>');
        if($success) {
            echo '<script type="text/javascript">window.parent.alert("' . $successMsg . '");document.location="?";</script>';
        } else {
            echo '<script type="text/javascript">window.parent.alert("' . $errorMsg . '");document.location="?";</script>';
        }
    }
}