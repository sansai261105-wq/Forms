<?php

// Get old name from POST
// ទទួលឈ្មោះចាស់ពី POST
$name = $_POST['name'] ?? '';

// Get old message from POST
// ទទួល Message ចាស់ពី POST
$message = $_POST['message'] ?? '';

// Check POST request
// ពិនិត្យ POST Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Remove extra spaces
    // លុបចន្លោះលើស
    $name = trim($name);

    // Check empty name
    // ពិនិត្យឈ្មោះទទេ
    if ($name === '') {

        echo "Name is required!";

    } else {

        echo "Form submitted successfully!";
    }
}
?>

<!-- Create Sticky Form -->
<!-- បង្កើត Form ដែលរក្សាទិន្នន័យចាស់ -->

<form method="POST">

    <!-- Text input with old value -->
    <!-- បង្ហាញឈ្មោះដែលបានបញ្ចូលពីមុន -->
    <input type="text" name="name"
        value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">

    <br><br>

    <!-- Textarea with old message -->
    <!-- បង្ហាញ Message ចាស់ -->
    <textarea name="message"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></textarea>

    <br><br>

    <button type="submit">Submit</button>

</form>