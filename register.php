<?php
session_start ();
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="register";
$port = 3306;

//Creating database connection
$conn = new mysqli ($servername, $username, $password, $dbname, $port)
if (conn->connect_error) {
    die("Connect failed" " . $conn->connect_eror");
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName =htmlspecialchars($_POST['fullName']);
    $gender =htmlspecialchars($_POST['gender']);
    $phonenumber =htmlspecialchars($_POST['phonenumber']);
    $homecell =htmlspecialchars($_POST['homecell']);

// prepare and bind
$stmt = $conn->prepare("INSERT INTO register (fullName, gender, phonenumber, homecell) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullName, $gender, $phonenumber, $homecell);

//Execute the statement
if ($stmt->execute()) {
    echo "You have successfully registered membership";

}
else{
    echo "Error: " . $stmt->error;
}
//close connection
$stmt->close();
$conn->close();
}
?>