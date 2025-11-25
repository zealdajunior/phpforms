<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    die("Access denied");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Student Dashboard</title>
 <style>
   body {
     font-family: Arial, sans-serif;
     background-color: #f0f2f5;
     margin: 0;
     padding: 20px;
     display: flex;
     justify-content: center;
     align-items: center;
     height: 100vh;
   }
   .dashboard-container {
     background: white;
     padding: 40px 60px;
     border-radius: 8px;
     box-shadow: 0 2px 8px rgba(0,0,0,0.1);
     text-align: center;
     width: 400px;
   }
   h1 {
     color: #28a745;
     margin-bottom: 20px;
   }
   p {
     font-size: 18px;
     color: #333;
   }
   a.logout {
     display: inline-block;
     margin-top: 30px;
     padding: 10px 25px;
     color: white;
     background-color: #dc3545;
     border-radius: 5px;
     text-decoration: none;
     font-weight: bold;
   }
   a.logout:hover {
     background-color: #c82333;
   }
 </style>
</head>
<body>
  <div class="dashboard-container">
    <h1>👋 Welcome Student!</h1>
    <p>You have successfully logged in as a student.</p>
    <a class="logout" href="logout.php">Logout</a>
  </div>
</body>
</html>
