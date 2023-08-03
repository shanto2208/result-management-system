<html>
    <head>
        <title>
            Login Page
        </title>
        <link rel="stylesheet" href="css\login.css">
    </head>
    <body>
        <div class="head">
            <h1 class="head_h1">Result Management System</h1>    
        </div>
        <div class="login">
            <div class="part2">
                <h1 class="part2_h1">Signup</h1>
                <form action="" method="post">
                    <label>Email : </label>
                    <input type="email" name="email"><br><br>
                    <label>Password  : </label>
                    <input type="password" name="pass"><br><br>
                    <label>Confirm Password  : </label>
                    <input type="password" name="confirm_pass"><br><br>
                    <button type="submit" class="button" >signup</button>
                    <p>If you have already an account please <a href=" login.php">login.</a></p>
                </form>
                <h3 class="message">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();



if(isset($_POST['pass']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $confirm_pass=$_POST['confirm_pass'];


$sql= "SELECT * FROM user WHERE email='$email'";
$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {

    $sql= "SELECT * FROM student WHERE s_Email='$email'";

    $result=mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result)==1) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

        $row1 = $row["s_Id"];
        $_SESSION['varname'] = $row1;

        
    //Insert Data to another table
        if($pass==$confirm_pass){
            $sql="INSERT INTO user (email,pass,s_Id) VALUES ('$email','$pass','$row1')";
            if (mysqli_query($conn, $sql)) {
                header("location:home1.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            header("location:home1.php");
            
        }
        else{
            echo"Psswords are not same";
            
        }
    }
    }else{
        echo"This email is invalid";
        
    } 
    
}else{
    echo"This email is invalid";
    
}



}





mysqli_close($conn);




?>

</h3>
</div>
        </div>
    </body>

</html>