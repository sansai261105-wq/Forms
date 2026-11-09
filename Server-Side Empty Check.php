<?php

// Check POST request
// ពិនិត្យ POST Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get username and remove extra spaces
    // ទទួល Username និងលុបចន្លោះលើស
    $username = trim($_POST['username'] ?? '');

    // Check if username is empty
    // ពិនិត្យថា Username ទទេឬអត់
    if ($username === '') {

        // Display error message
        // បង្ហាញសារកំហុស
        echo "Username is required!";

    } else {

        // Display username
        // បង្ហាញ Username
        echo "Welcome: " .
            htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    }
}
?>

<!-- Create Form -->
<!-- បង្កើត Form -->
<form method="POST">

    <!-- Input username -->
    <!-- បញ្ចូល Username -->
    <input type="text" name="username">

    <button type="submit">Submit</button>

</form>