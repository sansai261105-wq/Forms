<?php

// Get selected gender
// ទទួលភេទដែលបានជ្រើសរើស
$gender = $_POST['gender'] ?? '';

// Get selected skills
// ទទួលជំនាញដែលបានជ្រើសរើស
$skills = $_POST['skills'] ?? [];

// Make sure skills is an array
// ធានាថា Skills ជា Array
if (!is_array($skills)) {
    $skills = [];
}

// Get selected course
// ទទួល Course ដែលបានជ្រើសរើស
$course = $_POST['course'] ?? '';

// Check POST request
// ពិនិត្យ POST Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    echo "Gender: " .
        htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') . "<br>";

    echo "Skills: ";

    // Display selected skills
    // បង្ហាញជំនាញដែលបានជ្រើសរើស
    foreach ($skills as $skill) {
        echo htmlspecialchars($skill, ENT_QUOTES, 'UTF-8') . " ";
    }

    echo "<br>Course: " .
        htmlspecialchars($course, ENT_QUOTES, 'UTF-8');
}
?>

<form method="POST">

    <!-- Radio buttons -->
    <!-- ជ្រើសរើសភេទ -->
    Gender:

    <input type="radio" name="gender" value="Male"
        <?= $gender === 'Male' ? 'checked' : '' ?>> Male

    <input type="radio" name="gender" value="Female"
        <?= $gender === 'Female' ? 'checked' : '' ?>> Female

    <br><br>

    <!-- Checkbox array -->
    <!-- ជ្រើសរើសជំនាញច្រើន -->
    Skills:

    <input type="checkbox" name="skills[]" value="HTML"
        <?= in_array('HTML', $skills, true) ? 'checked' : '' ?>> HTML

    <input type="checkbox" name="skills[]" value="CSS"
        <?= in_array('CSS', $skills, true) ? 'checked' : '' ?>> CSS

    <input type="checkbox" name="skills[]" value="PHP"
        <?= in_array('PHP', $skills, true) ? 'checked' : '' ?>> PHP

    <br><br>

    <!-- Select dropdown -->
    <!-- ជ្រើសរើសមុខវិជ្ជា -->
    Course:

    <select name="course">

        <option value="">Select Course</option>

        <option value="PHP"
            <?= $course === 'PHP' ? 'selected' : '' ?>>PHP</option>

        <option value="React"
            <?= $course === 'React' ? 'selected' : '' ?>>React</option>

    </select>

    <br><br>

    <button type="submit">Submit</button>

</form>