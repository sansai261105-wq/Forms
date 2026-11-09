<?php

// Check POST request
// ពិនិត្យ POST Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Receive email from POST input
    // ទទួល Email ពី POST Input
    $email = filter_input(
        INPUT_POST,
        'email',
        FILTER_SANITIZE_EMAIL
    );

    // Validate sanitized email
    // ពិនិត្យថា Email ត្រឹមត្រូវឬអត់
    if ($email !== false && $email !== null &&
        filter_var($email, FILTER_VALIDATE_EMAIL)) {

        echo "Valid Email: " .
            htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

    } else {

        echo "Invalid Email!";
    }
}
?>

<!-- Create Email Form -->
<!-- បង្កើត Form សម្រាប់ Email -->
<form method="POST">

    <input type="text" name="email">

    <button type="submit">Submit</button>

</form>