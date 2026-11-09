<?php

// Start session
// ចាប់ផ្ដើម Session
session_start();

// Check POST request
// ពិនិត្យ POST Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get username and remove extra spaces
    // ទទួល Username និងលុបចន្លោះលើស
    $username = trim($_POST['username'] ?? '');

    // Check username
    // ពិនិត្យ Username
    if ($username === '') {

        // Store error message in session
        // រក្សាទុកសារកំហុសក្នុង Session
        $_SESSION['message'] = "Username is required!";

    } else {

        // Store success message in session
        // រក្សាទុកសារជោគជ័យក្នុង Session
        $_SESSION['message'] = "Welcome " . $username;
    }

    // Redirect to the same page
    // បញ្ជូន Browser ត្រឡប់ទៅ Page ដដែល
    header("Location: " . $_SERVER['PHP_SELF']);

    // Stop script execution
    // បញ្ឈប់ការដំណើរការ Script
    exit;
}

// Get message from session
// ទទួលសារពី Session
$message = $_SESSION['message'] ?? '';

// Remove message after displaying
// លុបសារចេញពី Session បន្ទាប់ពីទទួល
unset($_SESSION['message']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>PRG Form</title>
</head>
<body>

    <h2>PRG Pattern Form</h2>

    <!-- Display message -->
    <!-- បង្ហាញសារ -->
    <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>

    <!-- Create POST Form -->
    <!-- បង្កើត Form -->
    <form method="POST">

        <input type="text" name="username"
               placeholder="Enter Username">

        <button type="submit">Submit</button>

    </form>

</body>
</html>