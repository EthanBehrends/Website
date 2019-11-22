<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = strip_tags(trim($_POST["name"]));
	$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $number = strip_tags(trim($_POST["teamnum"]));
        $number = str_replace(array("\r","\n"),array(" "," "),$number);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        $recipient = "team1710.ygga@gmail.com";

        $subject = "Contact from ".$name;

        $email_content = "Name: ".$name."\n";
        $email_content .= "Email: ".$email."\n\n";
        $email_content .= "Team Number: ".$number."\n";
        $email_headers = "From: ".$name."<".$email.">";
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
