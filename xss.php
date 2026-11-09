<?php

// Get user input from URL
// ទទួលទិន្នន័យពី URL
$name = $_GET['name'] ?? '';

// Display raw user input
// បង្ហាញទិន្នន័យដោយមិនបានការពារ
// DO NOT use this method in real projects
// មិនគួរប្រើរបៀបនេះក្នុង Project ពិតទេ
echo $name;

?>

<form method="GET">

    <!-- Input name -->
    <!-- បញ្ចូលឈ្មោះ -->
    <input type="text" name="name">

    <button type="submit">Submit</button>

</form>