<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Forms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 20px;
        }
        section {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 24px;
        }
        form div {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 6px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="date"],
        select {
            padding: 10px 14px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1em;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<section>

    <h1>User Registration</h1>

    <form action="./register.php" method="POST">

       <!-- Name -->
        <div>
            <label for="name">Full Name</label>
            <input type="text" name="fullName" id="fullName" required />
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required />
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
        </div>

        <!-- Gender -->
        <div>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="rather_not_say">Rather Not Say</option>
            </select>
        </div>

        <!-- Phone Number -->
        <div>
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" name="phoneNumber" id="phoneNumber" required />
        </div>

        <!-- Address -->
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" />
        </div>

        <!-- Place of birth -->
        <div>
            <label for="placeOfBirth">Place of Birth</label>
            <input type="text" name="placeOfBirth" id="placeOfBirth" />
        </div>

        <!-- Date of birth -->
        <div>
            <label for="dateOfBirth">Date of Birth</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" />
        </div>

        <button type="submit">Submit</button>

    </form>



</section>


    
</body>
</html>