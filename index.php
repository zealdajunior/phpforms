<?php
require_once __DIR__ . "/database.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM phpforms WHERE emailAddress = ? LIMIT 1";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role']    = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: student_dashboard.php");
            }
            exit;
        } else {
            echo "<p class='error'>❌ Invalid password</p>";
        }
    } else {
        echo "<p class='error'>❌ No user found with that email</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Login</title>
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
     width: 300px;
     text-align: center;
   }
   input[type="email"],
   input[type="password"] {
     width: 100%;
     padding: 10px;
     margin: 10px 0;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
     font-size: 14px;
   }
   button {
     width: 100%;
     padding: 10px;
     background-color: #007bff;
     border: none;
     color: white;
     font-size: 16px;
     border-radius: 4px;
     cursor: pointer;
   }
   button:hover {
     background-color: #0056b3;
   }
   .error {
     color: red;
     margin-top: 10px;
   }
 </style>
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <form action="" method="post">
      <input type="email" name="email" placeholder="Email" required /><br />
      <input type="password" name="password" placeholder="Password" required /><br />
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Sign up</a></p>
  </div>
</body>
</html>
