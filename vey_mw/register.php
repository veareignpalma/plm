<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Reset and Font */
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
            height: 180vh;
            background: url('https://example.com/donation-background.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            background-blend-mode: multiply;
            background-color: #e3f2fd;
        }
        
        .container {
            background-color: #ffffff;
            padding: 40px 50px;
            box-shadow: 0 12px 24px rgba(33, 150, 243, 0.2); /* Pastel blue shadow */
            border-radius: 16px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(33, 150, 243, 0.3);
        }
        
        h2 {
            color: #1976d2;
            font-weight: 500;
            margin-bottom: 24px;
            font-size: 26px;
        }

        /* Form Fields */
        .form-group {
            position: relative;
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            text-align: left;
            font-size: 14px;
            color: #64b5f6;
            margin-bottom: 6px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group input[type="password"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 14px 14px 14px 40px;
            border-radius: 12px;
            border: 1px solid #bbdefb;
            font-size: 14px;
            color: #1e88e5;
            background-color: #e3f2fd;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #64b5f6;
            box-shadow: 0 0 6px rgba(100, 181, 246, 0.3);
        }

        /* Icons */
        .form-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #42a5f5;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .form-group input:focus + i,
        .form-group textarea:focus + i,
        .form-group select:focus + i {
            color: #1e88e5;
        }

        /* Submit Button */
        .btn {
            width: 100%;
            padding: 12px;
            background: #64b5f6;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 16px;
        }

        .btn:hover {
            background: #42a5f5;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(66, 165, 245, 0.2);
        }

        /* Extra styling */
        .info {
            margin-top: 10px;
            font-size: 14px;
            color: #90caf9;
        }

        .info a {
            color: #1e88e5;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .info a:hover {
            color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register Your Donation</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="donor_name">Name:</label>
                <input type="text" id="donor_name" name="donor_name" placeholder="Enter full name" required>
                <i class="fa fa-user"></i>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>
                <i class="fa fa-envelope"></i>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
                <i class="fa fa-lock"></i>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number (optional)">
                <i class="fa fa-phone"></i>
            </div>

            <div class="form-group">
                <label for="donation_amount">Donation Amount (P):</label>
                <input type="number" id="donation_amount" name="donation_amount" placeholder="Enter Amount" required>
                <i class="fa fa-money-bill-wave"></i>
            </div>

            <div class="form-group">
                <label for="donation_date">Date:</label>
                <input type="date" id="donation_date" name="donation_date" required>
                <i class="fa fa-calendar-alt"></i>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="3" placeholder="Write a message (optional)"></textarea>
                <i class="fa fa-comment"></i>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="Completed">Completed</option>
                    <option value="Pending">Pending</option>
                </select>
                <i class="fa fa-info-circle"></i>
            </div>

            <button type="submit" class="btn">Register</button>
        </form>
        <div class="info">
            <p>Your generosity helps us make a difference!</p>
            <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>
