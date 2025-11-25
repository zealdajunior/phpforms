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
   
    //make sure the required fields have inputs
    if(empty($fullName) || empty($emailAddress) || empty($password) || empty($gender) || empty($phoneNumber)){
      $_SESSION['error'] = "One or more fields are empty";
      redirect("./index.php");
      exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    try{
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
        echo "<p class='success'>✅ Registration successful!</p>";
    } else {
        echo "<p class='error'>❌ Error: " . $stmt->error . "</p>";
    }
    }
        catch(\Exception $e) {
      
        if($e->getCode() === 1062) {
            $_SESSION['error'] = "The email address already exists";
            redirect("./index.php");
        }else {
            $_SESSION['error'] = "Unexpected error please try again!";
            redirect("./index.php");
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Register</title>
 <style>
   body {
     font-family: Arial, sans-serif;
     background-color: #f0f2f5;
     display: flex;
     justify-content: center;
     align-items: center;
     height: 100vh;
     margin: 0;
   }
   .form-container {
     background: white;
     padding: 30px;
     border-radius: 8px;
     box-shadow: 0 2px 8px rgba(0,0,0,0.1);
     width: 350px;
     text-align: center;
     overflow-y: auto;
     max-height: 90vh;
   }
   input[type="text"],
   input[type="email"],
   input[type="password"],
   input[type="tel"],
   input[type="date"],
   select {
     width: 100%;
     padding: 10px;
     margin: 8px 0;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
     font-size: 14px;
   }
   button {
     width: 100%;
     padding: 10px;
     background-color: #28a745;
     border: none;
     color: white;
     font-size: 16px;
     border-radius: 4px;
     cursor: pointer;
   }
   button:hover {
     background-color: #218838;
   }
   .error {
     color: red;
     margin-top: 10px;
   }
   .success {
     color: green;
     margin-top: 10px;
   }
 </style>
</head>
<body>
  <div class="form-container">
    <h2>Register</h2>
    <form action="" method="post">
      <input type="text" name="fullName" placeholder="Full Name" required /><br />
      <input type="email" name="email" placeholder="Email" required /><br />
      <input type="password" name="password" placeholder="Password" required /><br />
      <select name="gender" required>
        <option value="" disabled selected>Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="rather_not_say">Rather Not Say</option>
      </select><br />
      <input type="tel" name="phoneNumber" placeholder="Phone Number" required /><br />
      <input type="text" name="address" placeholder="Address" /><br />
      <input type="text" name="placeOfBirth" placeholder="Place of Birth" /><br />
      <input type="date" name="dateOfBirth" /><br />
      <select name="role" required>
        <option value="student">Student</option>
        <option value="admin">Admin</option>
      </select><br />
      <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="index.php">Login here</a></p>
  </div>
</body>
</html>
