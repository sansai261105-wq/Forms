<?php

// Get user input
// ទទួលទិន្នន័យពី User
$name = $_GET['name'] ?? '';

// Protect output from HTML injection
// ការពារការបញ្ចូល HTML ដែលមានគ្រោះថ្នាក់
$safeName = htmlspecialchars(
    $name,

    // Convert single and double quotes
    // បម្លែង Single Quote និង Double Quote
    ENT_QUOTES | ENT_SUBSTITUTE,

    // Set character encoding
    // កំណត់ Character Encoding
    'UTF-8'
);

// Display safe output
// បង្ហាញទិន្នន័យដែលបានការពារ
echo $safeName;

?>

<form method="GET">

    <input type="text" name="name">

    <button type="submit">Submit</button>

</form>