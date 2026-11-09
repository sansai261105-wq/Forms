<?php

// Initialize result variable
// បង្កើត Variable សម្រាប់រក្សាលទ្ធផល
$result = '';

// Check POST request
// ពិនិត្យ POST Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get username
    // ទទួល Username
    $username = trim($_POST['username'] ?? '');

    // Validate username
    // ពិនិត្យ Username
    if ($username === '') {

        $result = "Username is required!";

    } else {

        $result = "Welcome " . $username;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Single File Form</title>
</head>
<body>

    <h2>Username Form</h2>

    <!-- Display result -->
    <!-- បង្ហាញលទ្ធផល -->
    <p><?= htmlspecialchars($result, ENT_QUOTES, 'UTF-8') ?></p>

    <!-- Form and PHP processing are in one file -->
    <!-- Form និង PHP Processing នៅក្នុង File តែមួយ -->
    <form method="POST">

        <input type="text" name="username"
               placeholder="Enter Username">

        <button type="submit">Submit</button>

    </form>

</body>
</html>