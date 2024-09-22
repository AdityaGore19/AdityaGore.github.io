<?php
    echo"hello";
    $to = "adityagore19@gmail.com";
    $from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars($_REQUEST['name']);
    $phone = htmlspecialchars($_REQUEST['phone']);
    $message = htmlspecialchars($_REQUEST['message']);
    
    // Validate email format
    if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from";

    $subject = "New message from $name";

    $fields = array();
    $fields["name"] = "Name";
    $fields["email"] = "Email";
    $fields["phone"] = "Phone";
    $fields["message"] = "Message";

    $body = "Here is what was sent:\r\n"; 

    foreach($fields as $a => $b) {
        $body .= "$b: ".$_REQUEST[$a]."\r\n";
    }

    $send = mail($to, $subject, $body, $headers);

    if($send) {
        echo "Message sent successfully!";
    } else {
        echo "Message sending failed.";
    }

?>
