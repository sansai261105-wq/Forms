
<?php

// Check if the form was submitted using POST
// ពិនិត្យថា Form ត្រូវបានបញ្ជូនដោយ POST ឬអត់
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get username from POST data
    // ទទួល Username ពី Form
    $username = $_POST['username'] ?? '';

    // Display username
    // បង្ហាញ Username ដោយការពារការ XSS
    echo "Username: " .
        htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
}

?>

<!-- Create HTML Form -->
<!-- បង្កើត Form -->
<form method="POST">

    <!-- Input username -->
    <!-- ប្រអប់បញ្ចូល Username -->
    <input type="text" name="username" placeholder="Enter Username">

    <!-- Submit form -->
    <!-- ប៊ូតុងបញ្ជូន Form -->
    <button type="submit">Submit</button>

</form>
