<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$id=$_GET['rn'];

$sql= "DELETE FROM student WHERE s_Id='$id'";

$sql1= "DELETE FROM user WHERE S_id='$id'";

$sql2= "DELETE FROM result WHERE Sid='$id'";
echo "Error: " . $id ;


if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql1)) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


if (mysqli_query($conn, $sql2)) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("location:admin.php");
mysqli_close($conn);




?>