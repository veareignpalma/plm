<?php
include('db/connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the donor to delete
$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;

// Check if the delete is confirmed
if (isset($_POST['confirm_delete'])) {
    // SQL to delete the record
    $delete_sql = "DELETE FROM abc WHERE ID = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<p>Record deleted successfully. </p>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
    exit;
}

// Fetch the donor details to display as confirmation
$sql = "SELECT * FROM abc WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$donor = $result->fetch_assoc();
$stmt->close();

if (!$donor) {
    echo "<p>Donor not found. <a href='donations.php'>Back to Donations</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Donor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #ffebee;
            font-family: 'Poppins', sans-serif;
            color: #d32f2f;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(211, 47, 47, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #b71c1c;
            margin-bottom: 20px;
        }
        p {
            color: #333;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .btn-confirm, .btn-cancel {
            padding: 10px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            text-decoration: none;
        }
        .btn-confirm {
            background-color: #d32f2f;
            color: white;
            margin-right: 10px;
            transition: background 0.3s;
        }
        .btn-confirm:hover {
            background-color: #b71c1c;
        }
        .btn-cancel {
            background-color: #cfd8dc;
            color: #333;
        }
        .btn-cancel:hover {
            background-color: #b0bec5;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete the following donation record?</p>
    <p><strong>Donor Name:</strong> <?php echo htmlspecialchars($donor['donor_name']); ?></p>
    <p><strong>Amount:</strong> <?php echo htmlspecialchars($donor['donation_amount']); ?></p>
    <p><strong>Date:</strong> <?php echo htmlspecialchars($donor['donation_date']); ?></p>
    <p><strong>Status:</strong> <?php echo htmlspecialchars($donor['status']); ?></p>

    <form method="POST" action="">
        <button type="submit" name="confirm_delete" class="btn-confirm">Yes, Delete</button>
        <a href="donation_details.php" class="btn-cancel"><br><br>Cancel</a>
    </form>
</div>

</body>
</html>
