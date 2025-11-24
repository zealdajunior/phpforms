<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName     = validateInput($_POST['fullName']);
    $emailAddress = validateInput($_POST['email']);
    $password     = validateInput($_POST['password']);
    $gender       = $_POST['gender'];
    $phoneNumber  = validateInput($_POST['phoneNumber']);
    $address      = validateInput($_POST['address']);
    $placeOfBirth = validateInput($_POST['placeOfBirth']);
    $dateOfBirth  = $_POST['dateOfBirth'];
    $role         = $_POST['role']; // NEW: student or admin

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO phpforms 
        (fullName, emailAddress, password, gender, phoneNumber, address, placeOfBirth, dateOfBirth, role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param(
        "sssssssss",
        $fullName,
        $emailAddress,
        $hashedPassword,
        $gender,
        $phoneNumber,
        $address,
        $placeOfBirth,
        $dateOfBirth,
        $role
    );

    if ($stmt->execute()) {
        echo "✅ Registration successful!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }
}
?>

<!-- Registration Form -->
<form action="" method="post">
  <input type="text" name="fullName" placeholder="Full Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <select name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="rather_not_say">Rather Not Say</option>
  </select><br>
  <input type="tel" name="phoneNumber" placeholder="Phone Number"><br>
  <input type="text" name="address" placeholder="Address"><br>
  <input type="text" name="placeOfBirth" placeholder="Place of Birth"><br>
  <input type="date" name="dateOfBirth"><br>
  <select name="role">
    <option value="student">Student</option>
    <option value="admin">Admin</option>
  </select><br>
  <button type="submit">Register</button>
</form>