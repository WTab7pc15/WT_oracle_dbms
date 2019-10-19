<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$name = $_POST["name"];
$age = $_POST["age"];
$dept = $_POST["dept"];
$gender = $_POST["gender"];
$class = $_POST["class"];
$address = $_POST["address"];
$email = $_POST["email"];
$passd = $_POST["pass"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $sql = "INSERT INTO students (name,age,dept, class,address,gender,email,passd)
VALUES ('$name','$class','$address','$phone','$email','$date','$gender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
