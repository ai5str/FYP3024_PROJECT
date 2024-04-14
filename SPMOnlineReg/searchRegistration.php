<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Registration</title>
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

        .container {
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            background-color: whitesmoke;
            border-radius: 30px;
            margin-top: 50px;
        }

        .update-container {
            padding: 20px;
            margin: 0 auto;
            margin-top: 20px;

            background-color: whitesmoke;
            border-radius: 30px;
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
    <section>
        <h2>Search Student Registration</h2>
        <form action="searchRegistration.php" method="POST">
            <label for="ic_number">IC Number:</label>
            <input type="text" id="ic_number" name="ic_number" required>
            <input type="submit" value="Search">
        </form>
    </section>
</div>

<div class="update-container">
    <h2>Update Student Registration</h2>
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
    // Check if IC number is set and not empty
    if (isset($_POST['ic_number']) && !empty($_POST['ic_number'])) {
        // Sanitize input to prevent SQL injection
        $ic_number = $conn->real_escape_string($_POST['ic_number']);

        // Search for the record first
        $search_query = "SELECT * FROM registration WHERE ic_number = '$ic_number'";
        $search_result = $conn->query($search_query);

        if ($search_result->num_rows > 0) {
            // Record found, display the record for updating
            $row = $search_result->fetch_assoc();

            // Check if the update form is submitted
            if (isset($_POST['fullname']) && !empty($_POST['fullname']) &&
                isset($_POST['address']) && !empty($_POST['address']) &&
                isset($_POST['poscode']) && !empty($_POST['poscode']) &&
                isset($_POST['city']) && !empty($_POST['city']) &&
                isset($_POST['state']) && !empty($_POST['state']) &&
                isset($_POST['phone']) && !empty($_POST['phone']) &&
                isset($_POST['email']) && !empty($_POST['email'])) {

                // Sanitize and validate each field
                $fullname = $conn->real_escape_string($_POST['fullname']);
                $address = $conn->real_escape_string($_POST['address']);
                $poscode = $conn->real_escape_string($_POST['poscode']);
                $city = $conn->real_escape_string($_POST['city']);
                $state = $conn->real_escape_string($_POST['state']);
                $phone = $conn->real_escape_string($_POST['phone']);
                $email = $conn->real_escape_string($_POST['email']);

                // SQL query to update only the specified fields
                $update_query = "UPDATE registration SET fullname = '$fullname', address = '$address', poscode = '$poscode', city = '$city', state = '$state', phone = '$phone', email = '$email' WHERE ic_number = '$ic_number'";

                // Execute the update query
                if ($conn->query($update_query) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                // Display the update form
                echo "<form action='searchRegistration.php' method='POST'>";
                echo "<label for='ic_number'>IC Number:</label>";
                echo "<input type='text' id='ic_number' name='ic_number' value='" . $row['ic_number'] . "' readonly><br>";
                echo "<label for='fullname'>Full Name:</label>";
                echo "<input type='text' id='fullname' name='fullname' value='" . $row['fullname'] . "' required><br>";
                echo "<label for='address'>Address:</label>";
                echo "<input type='text' id='address' name='address' value='" . $row['address'] . "' required><br>";
                echo "<label for='poscode'>Poscode:</label>";
                echo "<input type='text' id='poscode' name='poscode' value='" . $row['poscode'] . "' required><br>";
                echo "<label for='city'>City:</label>";
                echo "<input type='text' id='city' name='city' value='" . $row['city'] . "' required><br>";
                echo "<label for='state'>State:</label>";
                echo "<input type='text' id='state' name='state' value='" . $row['state'] . "' required><br>";
                echo "<label for='phone'>Phone:</label>";
                echo "<input type='text' id='phone' name='phone' value='" . $row['phone'] . "' required><br>";
                echo "<label for='email'>Email:</label>";
                echo "<input type='text' id='email' name='email' value='" . $row['email'] . "' required><br>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
            }
        } else {
            echo "<br><br>No record found for the provided IC number";
        }
    } else {
        echo "Invalid IC number";
    }
}


    // Close the database connection
    $conn->close();
    ?>
</div>

</body>
</html>