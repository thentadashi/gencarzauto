<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Result</title>
</head>
<body>
    <h1>Form Submission Result</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $province = $_POST['province'] ?? '';
        $municipality = $_POST['municipality'] ?? '';
        $barangay = $_POST['barangay'] ?? '';

        // Display the selected values
        echo "<p>Province: $province</p>";
        echo "<p>Municipality: $municipality</p>";
        echo "<p>Barangay: $barangay</p>";
    }
    ?>
    <p><a href="index.php">Go back to the form</a></p>
</body>
</html>
