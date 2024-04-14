<?php
$servername="localhost"; //Host name
$username="root"; //MySQL username
$password=""; //MySQL password
$dbName="spmregistration"; //Database name

//Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

//Check connection
if($conn->connect_error) {
	die("Connection failed." .$conn->connect_error);
}
?>
