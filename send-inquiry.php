<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit();
}

// GET DATA
$pickup = htmlspecialchars(trim($_POST['pickup'] ?? ''));
$drop = htmlspecialchars(trim($_POST['drop'] ?? ''));
$date = htmlspecialchars(trim($_POST['date'] ?? ''));
$phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
$passengers = htmlspecialchars(trim($_POST['passengers'] ?? ''));

// VALIDATION
if ($pickup === '' || $drop === '' || $phone === '') {
    echo "Required fields missing.";
    exit();
}

// EMAIL CONFIG
$to = "Durgatravels89@gmail.com";
$subject = "🚖 New Taxi Booking Inquiry - Durga Travels";

$fromEmail = "no-reply@durgatravels.org.in";
$fromName = "Durga Travels";

// EMAIL BODY
$message = "
<html>
<body style='font-family:Arial;'>

<h2>🚖 New Booking Inquiry</h2>

<table border='1' cellpadding='10' cellspacing='0'>
<tr><td><b>Pickup</b></td><td>$pickup</td></tr>
<tr><td><b>Drop</b></td><td>$drop</td></tr>
<tr><td><b>Date</b></td><td>$date</td></tr>
<tr><td><b>Phone</b></td><td>$phone</td></tr>
<tr><td><b>Passengers</b></td><td>$passengers</td></tr>
</table>

<br>
<p>
<b>Brand:</b> Durga Travels<br>
<b>Phone:</b> 9718562020 / 9718962020<br>
<b>Location:</b> Noida
</p>

</body>
</html>
";

// HEADERS
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: $fromName <$fromEmail>\r\n";

// SEND MAIL
if (mail($to, $subject, $message, $headers)) {
    header("Location: thank-you.html");
    exit();
} else {
    echo "Mail sending failed.";
}
?>