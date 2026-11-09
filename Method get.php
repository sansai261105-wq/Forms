
<?php

// Check if the name parameter exists
// ពិនិត្យថាមានទិន្នន័យ Name ឬអត់
if (isset($_GET['name'])) {

    // Get student name from URL
    // ទទួលឈ្មោះសិស្សពី GET
    $name = trim($_GET['name']);

    // Display student name
    // បង្ហាញឈ្មោះសិស្ស
    echo "Student Name: " .
        htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
}

?>

<!-- Create GET Form -->
<!-- បង្កើត Form ដោយប្រើ GET -->
<form method="GET">

    <!-- Input student name -->
    <!-- បញ្ចូលឈ្មោះសិស្ស -->
    <input type="text" name="name" placeholder="Enter Student Name">

    <!-- Search button -->
    <!-- ប៊ូតុងស្វែងរក -->
    <button type="submit">Search</button>

</form>
