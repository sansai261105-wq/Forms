
<?php

// Check the HTTP request method
// ពិនិត្យប្រភេទ HTTP Method ដែល Browser បានផ្ញើមក

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Display message when the request method is POST
    // បង្ហាញសារនៅពេល User បញ្ជូន Form ដោយប្រើ POST
    echo "Form submitted using POST";

} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Display message when the request method is GET
    // បង្ហាញសារនៅពេល Browser ស្នើសុំ Page ដោយប្រើ GET
    echo "Page requested using GET";

}

// End PHP code
?>
