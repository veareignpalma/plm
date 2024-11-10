<?php
include('db/connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* Basic styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #e1f5fe, #bbdefb); /* Soft pastel blue gradient */
            font-family: 'Poppins', sans-serif;
            color: #0d47a1;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(33, 150, 243, 0.2);
            text-align: center;
            max-width: 700px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(33, 150, 243, 0.3);
        }

        h2 {
            color: #1565c0;
            font-weight: 500;
            margin-bottom: 20px;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 14px;
            text-align: left;
            border: 1px solid #bbdefb;
        }

        table th {
            background-color: #e1f5fe;
            color: #1976d2;
            font-weight: 500;
        }

        table tr:nth-child(even) {
            background-color: #e3f2fd;
        }

        table tr:nth-child(odd) {
            background-color: #f1f8ff;
        }

        .btn {
            padding: 10px 24px;
            background-color: #64b5f6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            font-size: 16px;
            margin-top: 20px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #42a5f5;
            transform: translateY(-3px);
        }

        .action-links a {
            color: #1e88e5;
            text-decoration: none;
            margin: 0 8px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .action-links a:hover {
            color: #1565c0;
        }

        .back-link {
            margin-top: 20px;
            display: inline-block;
            color: #1565c0;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Donation Details</h2>

    <table>
        <tr align="center">
            <th>#</th>
            <th>Donor Name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT * FROM abc";
        $result = $conn->query($sql);
        
        // Check if any donations exist
        if ($result->num_rows > 0) {
            // Loop to display each client account    
            $count = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td> $count </td>";
                echo "<td>" . $row['donor_name'] . "</td>";
                echo "<td>" . $row['donation_amount'] . "</td>";
                echo "<td>" . $row['donation_date'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo "<a href='edit_donor.php?ID=" . $row['ID'] . "'>Edit</a> | ";
                echo "<a href='delete_donor.php?ID=" . $row['ID'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
                $count++;
            }
        } 
        ?>
    </table>
    <a href="register.php" class="btn">Make a New Donation</a>
    <a href="index.php" class="back-link">Back to Home</a>
</div>

</body>
</html>