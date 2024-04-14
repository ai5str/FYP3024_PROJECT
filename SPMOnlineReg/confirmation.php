<!DOCTYPE html>
<html>
<head>
    <title>SMAJA SPM Online Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .subject-table {
            border-collapse: collapse;
            width: 100%;
        }

        .subject-table th, .subject-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 5px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .button-container {
            text-align: center;
        }

        .button-container button {
            margin: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Confirmation</h1>
        <?php
        // Function to sanitize form inputs
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Define variables to store form data
            $fullname = sanitize_input($_POST["fullname"]);
            $ic = sanitize_input($_POST["ic_number"]);
            $gender = isset($_POST["gender"]) ? sanitize_input($_POST["gender"]) : "";
            $dob = sanitize_input($_POST["dob"]);
            $ethnicity = sanitize_input($_POST["ethnicity"]);
            $religion = sanitize_input($_POST["religion"]);
            $oku = sanitize_input($_POST["oku"]);
            $okuCard = sanitize_input($_POST["okuCard"]);
            $entry = sanitize_input($_POST["entry"]);
            $year = sanitize_input($_POST["year"]);
            $address = sanitize_input($_POST["address"]);
            $poscode = sanitize_input($_POST["poscode"]);
            $city = sanitize_input($_POST["city"]);
            $state = sanitize_input($_POST["state"]);
            $phone = sanitize_input($_POST["phone"]);
            $email = sanitize_input($_POST["email"]);
            $subjects = isset($_POST["subjects"]) ? implode(", ", $_POST["subjects"]) : "";

            $date = date("d-m-Y");

            // Establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbName = "spmregistration";
            $conn = new mysqli($servername, $username, $password, $dbName);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute SQL statement to insert data into the database
            $stmt = $conn->prepare("INSERT INTO registration (fullname, ic_number, gender, dob, ethnicity, religion, oku, okuCard, entry, year, address, poscode, city, state, phone, email, subjects) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssssssss", $fullname, $ic, $gender, $dob, $ethnicity, $religion, $oku, $okuCard, $entry, $year, $address, $poscode, $city, $state, $phone, $email, $subjects);

            if ($stmt->execute()) {
                // Data insertion successful, display confirmation
                echo "<p>Date: <b>$date</b></p>";
                echo "<h3>SMAJA SPM Online Registration</h3>";
                echo "<table>";
                echo "<tr><th>Field</th><th>Value</th></tr>";
                echo "<tr><td>Name</td><td><b>$fullname</b></td></tr>";
                echo "<tr><td>IC Number/Birth Certification</td><td><b>$ic</b></td></tr>";
                echo "<tr><td>Gender</td><td><b>$gender</b></td></tr>";
				echo "<tr><td>Date of Birth</td><td><b>$dob</b></td></tr>";
				echo "<tr><td>Ethnicity</td><td><b>$ethnicity</b></td></tr>";
				echo "<tr><td>Religion</td><td><b>$religion</b></td></tr>";
				echo "<tr><td>Jenis Kecacatan</td><td><b>$oku</b></td></tr>";
				echo "<tr><td>Kad OKU</td><td><b>$okuCard</b></td></tr>";
				echo "<tr><td>Jenis Kemasukan</td><td><b>$entry</b></td></tr>";
				echo "<tr><td>Tahun</td><td><b>$year</b></td></tr>";
				echo "<tr><td>Address</td><td><b>$address</b></td></tr>";
				echo "<tr><td>Poscode</td><td><b>$poscode</b></td></tr>";
				echo "<tr><td>City</td><td><b>$city</b></td></tr>";
				echo "<tr><td>State</td><td><b>$state</b></td></tr>";
				echo "<tr><td>Phone</td><td><b>$phone</b></td></tr>";
				echo "<tr><td>Email</td><td><b>$email</b></td></tr>";

                // Continue displaying other fields similarly
                // Display selected subjects in a table
                echo "<tr><td>Subjects</td><td colspan='2'>";
                echo "<table class='subject-table'>";
                echo "<tr><th>Selected Subjects</th></tr>";
                // Check if subjects are selected
                if (!empty($subjects)) {
                    // Explode the subjects string into an array
                    $selectedSubjects = explode(", ", $subjects);
                    // Output the subjects in a table format
                    foreach ($selectedSubjects as $subject) {
                        echo "<tr><td>$subject</td></tr>";
                    }
                } else {
                    // If no subjects are selected, display a message
                    echo "<tr><td>No subjects selected</td></tr>";
                }
                echo "</table></td></tr>";
                echo "</table>";
                echo "<p>Your registration has been successfully submitted.</p>";
                echo "<div class='button-container'>";
                echo "<button><a href='registration.php'>Back</a></button>";
                echo "<input type='button' name='printButton' onclick='window.print()' value='Print'>";
                echo "</div>";

                // Close statement and database connection
                $stmt->close();
                $conn->close();
            } else {
                echo "Error: " . $stmt->error; // Display error message if data insertion fails
            }
        } else {
            // If the form is not submitted, display a message
            echo "<p>No data submitted.</p>";
        }
        ?>

    </div>
</body>
</html>
