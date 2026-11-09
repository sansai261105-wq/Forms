# PHP Student Registration & Form Validation System

```php
<?php
session_start();

// ======================================
// 1. Define allowed values
// កំណត់តម្លៃដែលអនុញ្ញាត
// ======================================

$allowedSkills = ["HTML", "CSS", "PHP", "JavaScript"];
$allowedGenders = ["Male", "Female"];
$allowedCourses = ["PHP", "React", "Python"];

// ======================================
// 2. HTML Escape Function
// ការពារការវាយបញ្ចូល HTML/JavaScript (XSS)
// ======================================

function e($value) {
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

// ======================================
// 3. Initialize variables
// កំណត់អថេរដំបូង
// ======================================

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? "";
$student = $_SESSION['student'] ?? null;

unset($_SESSION['errors']);
unset($_SESSION['success']);
unset($_SESSION['student']);

// ======================================
// 4. GET Method
// ប្រើ GET សម្រាប់ Search
// ======================================

$search = trim($_GET['search'] ?? "");

// ======================================
// 5. POST Method
// ទទួលទិន្នន័យពី Form
// ======================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get form data
    $name = trim($_POST['name'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $age = trim($_POST['age'] ?? "");
    $gender = $_POST['gender'] ?? "";
    $course = $_POST['course'] ?? "";
    $message = trim($_POST['message'] ?? "");

    // Get checkbox array
    $skills = $_POST['skills'] ?? [];

    // Make sure skills is an array
    if (!is_array($skills)) {
        $skills = [];
    }

    // ==================================
    // 6. Validate Name
    // ពិនិត្យឈ្មោះ
    // ==================================

    if ($name === "") {
        $errors[] = "Please enter your full name.";
    }

    // ==================================
    // 7. Validate Email
    // ពិនិត្យ Email
    // ==================================

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // ==================================
    // 8. Validate Age
    // ពិនិត្យអាយុ
    // ==================================

    if (
        filter_var($age, FILTER_VALIDATE_INT) === false ||
        (int)$age < 1 ||
        (int)$age > 100
    ) {
        $errors[] = "Age must be between 1 and 100.";
    }

    // ==================================
    // 9. Validate Gender
    // ពិនិត្យ Gender
    // ==================================

    if (!in_array($gender, $allowedGenders, true)) {
        $errors[] = "Please select a valid gender.";
    }

    // ==================================
    // 10. Validate Course
    // ពិនិត្យ Course
    // ==================================

    if (!in_array($course, $allowedCourses, true)) {
        $errors[] = "Please select a valid course.";
    }

    // ==================================
    // 11. Validate Skills
    // ពិនិត្យ Checkbox
    // ==================================

    $validSkills = [];

    foreach ($skills as $skill) {

        if (
            is_string($skill) &&
            in_array($skill, $allowedSkills, true)
        ) {
            $validSkills[] = $skill;
        }
    }

    // ==================================
    // 12. Save data or show errors
    // រក្សាទុកទិន្នន័យ ឬបង្ហាញ Error
    // ==================================

    if (empty($errors)) {

        $_SESSION['student'] = [
            "name" => $name,
            "email" => $email,
            "age" => $age,
            "gender" => $gender,
            "skills" => $validSkills,
            "course" => $course,
            "message" => $message
        ];

        $_SESSION['success'] = "Registration successful!";

    } else {

        $_SESSION['errors'] = $errors;

    }

    // ==================================
    // 13. PRG Pattern
    // Redirect after POST
    // ==================================

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #f3f0ff;
            color: #333;
        }

        .container {
            max-width: 750px;
            margin: auto;
        }

        .header {
            text-align: center;
            color: #6d28d9;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h2 {
            color: #6d28d9;
            margin-top: 0;
        }

        label {
            display: block;
            margin: 15px 0 7px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .option {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin: 8px 15px 5px 0;
        }

        .option label {
            display: inline;
            margin: 0;
            font-weight: normal;
        }

        button {
            background: #6d28d9;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 7px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 15px;
        }

        button:hover {
            background: #4c1d95;
        }

        .reset {
            background: #777;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .result {
            line-height: 1.9;
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-form input {
            flex: 1;
        }

        .search-form button {
            margin-top: 0;
        }

        @media(max-width: 500px) {
            .search-form {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Student Registration</h1>
        <p>PHP Form Processing & Validation System</p>
    </div>

    <!-- GET Search Form -->
    <div class="card">

        <h2>Search Student</h2>

        <form method="GET" action="">

            <div class="search-form">

                <input
                    type="text"
                    name="search"
                    placeholder="Enter student name..."
                    value="<?= e($search) ?>"
                >

                <button type="submit">Search</button>

            </div>

        </form>

        <?php if ($search !== ""): ?>

            <p>
                Search keyword:
                <strong><?= e($search) ?></strong>
            </p>

        <?php endif; ?>

    </div>

    <!-- POST Registration Form -->
    <div class="card">

        <h2>Student Information</h2>

        <!-- Display Errors -->
        <?php if (!empty($errors)): ?>

            <div class="error">

                <strong>Please fix the following errors:</strong>

                <ul>
                    <?php foreach ($errors as $error): ?>

                        <li><?= e($error) ?></li>

                    <?php endforeach; ?>
                </ul>

            </div>

        <?php endif; ?>

        <!-- Display Success -->
        <?php if ($success !== ""): ?>

            <div class="success">
                <?= e($success) ?>
            </div>

        <?php endif; ?>

        <form method="POST" action="">

            <!-- Full Name -->
            <label>Full Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter your name"
                required
            >

            <!-- Email -->
            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >

            <!-- Age -->
            <label>Age</label>

            <input
                type="number"
                name="age"
                min="1"
                max="100"
                placeholder="Enter your age"
                required
            >

            <!-- Gender -->
            <label>Gender</label>

            <div class="option">
                <input
                    type="radio"
                    name="gender"
                    value="Male"
                    required
                >
                <label>Male</label>
            </div>

            <div class="option">
                <input
                    type="radio"
                    name="gender"
                    value="Female"
                >
                <label>Female</label>
            </div>

            <!-- Skills -->
            <label>Skills</label>

            <?php foreach ($allowedSkills as $skill): ?>

                <div class="option">

                    <input
                        type="checkbox"
                        name="skills[]"
                        value="<?= e($skill) ?>"
                    >

                    <label><?= e($skill) ?></label>

                </div>

            <?php endforeach; ?>

            <!-- Course -->
            <label>Course</label>

            <select name="course" required>

                <option value="">-- Select Course --</option>

                <?php foreach ($allowedCourses as $courseOption): ?>

                    <option value="<?= e($courseOption) ?>">
                        <?= e($courseOption) ?>
                    </option>

                <?php endforeach; ?>

            </select>

            <!-- Message -->
            <label>Message</label>

            <textarea
                name="message"
                placeholder="Write your message..."
            ></textarea>

            <!-- Buttons -->
            <button type="submit">Register Student</button>

            <button
                type="reset"
                class="reset"
            >
                Reset
            </button>

        </form>

    </div>

    <!-- Student Result -->
    <?php if ($student !== null): ?>

        <div class="card result">

            <h2>Registration Result</h2>

            <p>
                <strong>Name:</strong>
                <?= e($student['name']) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= e($student['email']) ?>
            </p>

            <p>
                <strong>Age:</strong>
                <?= e($student['age']) ?>
            </p>

            <p>
                <strong>Gender:</strong>
                <?= e($student['gender']) ?>
            </p>

            <p>
                <strong>Skills:</strong>
                <?= e(implode(", ", $student['skills'])) ?>
            </p>

            <p>
                <strong>Course:</strong>
                <?= e($student['course']) ?>
            </p>

            <p>
                <strong>Message:</strong>
                <?= nl2br(e($student['message'])) ?>
            </p>

        </div>

    <?php endif; ?>

</div>

</body>
</html>
```

