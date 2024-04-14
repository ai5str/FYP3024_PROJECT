<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "spmregistration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Notification messages
$notification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Validate the email format using PHP built-in filter_var function
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $notification = "<p class='notification error'>Invalid email format. Please enter a valid email.</p>";
    } else {
        // Proceed with other operations like database querying or further validation
        // For now, we'll just display a success message
        header("Location: registration.php"); // Change 'next_page.php' to the actual URL of the next page
        exit(); // Make sure to exit after setting the location header to prevent further execution
    }
}

// Close connection
$conn->close();
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
            padding: 10px 20px;
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

        .notification {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .notification.error {
            background-color: #f44336; /* Red */
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>LOGIN</h2><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label for="email">Email:</label>
            <input type="text" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <?php echo $notification; ?>

        <br><b><p style="font-size: 13px;">Is this your first time here? <a href="userLogin.php">Sign up</a><br>Access for SPM Online Registration.</p></b>
        <p style="font-size: 13px;">Password: 12345 (Default Password)</p>

    </div>
</body>

</html>
