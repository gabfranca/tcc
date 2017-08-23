<?php

$servername = "127.0.0.1:3306";
$username = "root";
$password = "root";
$dbname = "myDB";


$categoria = $_POST['categoria'];
//$myboxes = $_POST['myCheckbox'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo $categoria;



$sql = "insert into categorias VALUES (null, '$categoria');";

if ($conn->query($sql) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "<br> Error: " . $sql . "<br>" . $conn->error;
}
 

$conn->close();
?>