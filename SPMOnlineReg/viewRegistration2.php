<?php
$servername = "localhost"; // Host name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbName = "spmregistration"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch registration data from the database
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;

        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        header img {
            width: 100px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
        }


        nav {
            background-color: #444;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        section {
            padding: 20px;
        }


    </style>
</head>

<body>
    <header>
        <img src="smaja.jpg" alt="Website Logo">
        <h1>SMAJA SPM Online Registration</h1>
    </header>
    <nav>
        <a href="adminHome.html">Home</a>
        <a href="viewRegistration2.php">Students Registration</a>
        <a href="searchRegistration.php">Update Students</a>
        <a href="adminDelete.php">Delete Students</a>
        <a href="adminLogout.php">Log Out</a>
    </nav>
  
    <h2 style="align-items: center;">Registration History</h2>
    <table>
        <tr>
            <th>Full Name</th>
            <th>IC Number</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Ethnicity</th>
            <th>Religion</th>
            <th>Jenis Kecacatan</th>
            <th>No. Kad OKU</th>
            <th>Entry</th>
            <th>Year</th>
            <th>Address</th>
            <th>Poscode</th>
            <th>City</th>
            <th>State</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Subjects</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["fullname"] . "</td>";
                echo "<td>" . $row["ic_number"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["dob"] . "</td>";
                echo "<td>" . $row["ethnicity"] . "</td>";
                echo "<td>" . $row["religion"] . "</td>";
                echo "<td>" . $row["oku"] . "</td>";
                echo "<td>" . $row["okuCard"] . "</td>";
                echo "<td>" . $row["entry"] . "</td>";
                echo "<td>" . $row["year"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["poscode"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["subjects"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='17'>No registrations found</td></tr>";
        }
        ?>
    </table>

</body>

</html>
