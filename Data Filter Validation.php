
<?php

// Check POST request
// ពិនិត្យ POST Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get email and remove extra spaces
    // ទទួល Email និងលុបចន្លោះលើស
    $email = trim($_POST['email'] ?? '');

    // Validate email format
    // ពិនិត្យទម្រង់ Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Display valid email
        // បង្ហាញថា Email ត្រឹមត្រូវ
        echo "Valid Email!";

    } else {

        // Display invalid email
        // បង្ហាញថា Email មិនត្រឹមត្រូវ
        echo "Invalid Email!";
    }
}

?>

<!-- Create email form -->
<!-- បង្កើត Form សម្រាប់ Email -->
<form method="POST">

    <!-- Email input -->
    <!-- ប្រអប់បញ្ចូល Email -->
    <input type="email" name="email">

    <!-- Submit button -->
    <!-- ប៊ូតុងបញ្ជូន -->
    <button type="submit">Check Email</button>

</form>
