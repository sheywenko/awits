<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $company = strip_tags(trim($_POST["company"]));
    $message = trim($_POST["message"]);

    // Validate required fields
    if (empty($name) || empty($email) || empty($company) || empty($message)) {
        http_response_code(400); // Bad Request
        echo "Please complete all required fields.";
        exit;
    }

    // Prepare email
    $to = "care@awits.net";
    $subject = "📩 New Contact Form Submission from " . $_POST['name'];
    // $subject = "New Message from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Company: $company\n";
    $email_content .= "Message:\n$message\n";

    // $headers = "From: $name <$email>";
    $headers = "From: AWITS Contact <care@awits.net>\r\n";
    $replyTo = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $headers .= "Reply-To: $replyTo\r\n";


    Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "success"; 
    } else {
        http_response_code(500); // Internal Server Error
        echo "There was a problem sending your message.";
    }
    echo "success";
} else {
    http_response_code(403); // Forbidden
    echo "Invalid request.";
}
?>
