<?php

$servername = "localhost"; // Host name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbName = "spmregistration"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed." . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["myusername"];
    $password = $_POST["password"];

    if (empty($username) && empty($password)) {
        echo "<p class='error'>username and password are required.</p>";
    } else {
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p class='success'>Registration successful for user: $username</p>";

            header("Location: adminHome.html");
            exit();
        } else {
            echo "<p class='error'>Error in registration. Please try again later.</p>";
        }

        // Close statement
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: verdana;
            background-color: whitesmoke;
            color: #3d3d3d;
            margin: 0;
            padding: 0;
            font-size: 15px;
        }

        .container {
            
            margin: 150px auto;
            background-color: lightgrey;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 14px 16px rgba(0, 0, 0, 0.1);
            text-align: left;
            max-width: 300px;
            width: 100%;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: white;
        }

        button {
            background-color: #3d3d3d;
            color: #ffffff;
            padding: 10px 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 110px;
            position: relative;
        }

        button:hover {
            background-color: dimgrey;
        }

        button::after {
            content: "";
            position: absolute;
            bottom: -20px; /* Adjust the distance of the underline from the button */
            left: -115px;
            width: 390%;
            height: 1px; /* Adjust the thickness of the underline */
            background-color: #a6a6a6; /* Match the button background color */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>LOGIN</h2><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label for="username">Username:</label>
            <input type="text" name="myusername" placeholder="Staff ID" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <br><b><p style="font-size: 13px;">Is this your first time here?<br> Access for SPM Online Registration.</p></b>
        <p style="font-size: 13px;">Password: 12345 (Default Password)</p>

    </div>
</body>

</html>