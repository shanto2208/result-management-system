<html>
    <head>
        <title>
            Login Page
        </title>
        <link rel="stylesheet" href="css\login.css">
    </head>

    <body>
        <div class="head">
            <h1 class="head_h1">Student Result Management System</h1>    
        </div>
        <div class="login ">
            <div class="part2">
                <h1 class="part2_h1">Login</h1>
                <form action="login.php" method="post">
                    <label>Email : </label>
                    <input type="email" name="email"><br><br>
                    <label>Password  : </label>
                    <input type="password" name="pass"><br>
                    <button type="submit" class="button" >Login</button>
                </form>
    
                <p>If you don't any account please <a href=" signup.php">Sign up.</a></p>
            




                <h3 class="message">
<?php
include 'connect.php';


if(isset($_POST['email']))
{

$email=$_POST['email'];
$password=$_POST['pass'];
session_start();


$sql= "SELECT * FROM student WHERE s_Email='$email'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        $row1 = $row["s_Id"];
        $row2 = $row["s_Id"];
    }

        $_SESSION['varname'] = $row1;

        $sql =" SELECT * FROM user WHERE email='$email' AND pass= '$password'";

        $result=mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)==1){

            $x++;
            header("location:home1.php");

        } else{


            
            echo"Email or password is incorrect";
            
        }
}
else
{

    $sql= "SELECT * FROM admin WHERE email='$email'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $row1 = $row["email"];
            }
                $_SESSION['name'] = $row1;

            $sql =" SELECT * FROM admin WHERE email='$email' AND pass= '$password' ";
            $result=mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)==1){
    
                header("location:admin.php");
             

            }else{
                echo" Email or password is incorrect";
                
            }  
    }
}

}






mysqli_close($conn);


?>
</h3>
</div>
        </div>
    </body>

</html>