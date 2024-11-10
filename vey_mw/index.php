<?php

// Include the database connection
include('db/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* Basic Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #d7e7f6, #b3d4f0); /* Soft pastel blue gradient */
            color: #1a73e8;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(70, 130, 180, 0.15);
            max-width: 700px;
            width: 100%;
            transition: box-shadow 0.3s, transform 0.3s;
        }
        .container:hover {
            box-shadow: 0 14px 28px rgba(70, 130, 180, 0.25);
            transform: translateY(-3px);
        }
        h1 {
            color: #1a73e8;
            margin-bottom: 20px;
            font-size: 36px;
        }
        p {
            color: #3c80b1;
            font-size: 18px;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            margin: 10px;
            color: #ffffff;
            background-color: #64b5f6;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: background 0.3s, transform 0.3s;
        }
        .btn:hover {
            background-color: #42a5f5;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to the Donation Management System</h1>
    <p>Manage your donations easily with our system. Register new donations, view past contributions, and help make a difference.</p>
    
    <a href="register.php" class="btn">Register a Donation</a>
    <a href="donation_details.php" class="btn">View Donations</a>
    <a href="about.php" class="btn">About Us</a>
</div>

</body>
</html>
