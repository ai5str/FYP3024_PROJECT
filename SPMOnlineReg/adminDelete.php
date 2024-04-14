<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spmregistration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if ic_number is set and not empty
    if (isset($_POST['ic_number']) && !empty($_POST['ic_number'])) {
        // Sanitize input to prevent SQL injection
        $ic_number = $conn->real_escape_string($_POST['ic_number']);

        // SQL query to delete a record
        $sql = "DELETE FROM registration WHERE ic_number = '$ic_number'";

        if ($conn->query($sql) === TRUE) {
            // Check if any rows were affected by the DELETE operation
            if ($conn->affected_rows > 0) {
                echo "<script>alert('Student record was removed successfully')</script>";
            } else {
                echo "<script>alert('No record found with the provided IC number.')</script>";
            }
        } else {
            echo "<script>alert('Error deleting record: ')</script>" . $conn->error;
        }
    } else {
        echo "<script>alert('Invalid IC number. Please provide a valid IC number.')</script>";
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Student</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            margin: 0 auto;
            max-width: 600px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3d3d3d;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: dimgrey;
        }

        .container {
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            background-color: whitesmoke;
            border-radius: 30px;
            margin-top: 50px;
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


<div class="container">
    <h2>Remove Student Registration</h2>
    <form action="adminDelete.php" method="POST" enctype="multipart/form-data">
        <label for="ic_number">IC Number:</label>
    <input type="text" id="ic_number" name="ic_number" required>
        <input type="submit" value="Remove">
    </form>
</div>  


</body>
</html>
