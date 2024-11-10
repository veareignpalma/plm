<?php
include('db/connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the donor to edit
$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $donor_name = $_POST['donor_name'];
    $donation_amount = $_POST['donation_amount'];
    $status = $_POST['status'];

    // Update the donor details in the database
    $update_sql = "UPDATE abc SET donor_name = ?, donation_amount = ?, status = ? WHERE ID = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sdsi", $donor_name, $donation_amount, $status, $id);

    if ($stmt->execute()) {
        echo "<p><br>Record updated successfully. </p>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
}

// Fetch the current details of the donor
$sql = "SELECT * FROM abc WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$donor = $result->fetch_assoc();
$stmt->close();

if (!$donor) {
    echo "<p>Donor not found. <a href='donation_details.php'>Back to Donations</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #e3f2fd;
            font-family: 'Poppins', sans-serif;
            color: #1565c0;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(33, 150, 243, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #0d47a1;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #bbdefb;
            border-radius: 8px;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 24px;
            background-color: #42a5f5;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #1e88e5;
        }
        a.back-link {
            display: block;
            margin-top: 20px;
            color: #1e88e5;
            text-decoration: none;
        }
        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Donor Details</h2>

    <form method="POST" action="">
        <label for="donor_name">Donor Name</label>
        <input type="text" id="donor_name" name="donor_name" value="<?php echo htmlspecialchars($donor['donor_name']); ?>" required>

        <label for="donation_amount">Donation Amount</label>
        <input type="number" id="donation_amount" name="donation_amount" step="0.01" value="<?php echo htmlspecialchars($donor['donation_amount']); ?>" required>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="Pending" <?php echo $donor['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="Completed" <?php echo $donor['status'] === 'Completed' ? 'selected' : ''; ?>>Completed</option>
        </select>

        <button type="submit" class="btn">Update Donor</button>
        <a href="donation_details.php" class="btn-view"><br><br>View Details</a>
    </form>

</div>

</body>
</html>
