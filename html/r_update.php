<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" href="css\update.css">
    </head>

    <body>

    <div class="head">
            <h1 class="head_h1">Result Management System</h1>    
    </div>

        <div class="head2">

            <div class="sidebar">
                
                <a href="admin.php"><div class="bar" name="List">
                    <button class="btn" name="List" >Student List</button>
                </div></a>

                <a href="add.php"><div class="bar">
                    <button href="add.php" class="btn">Add Student</button>
                </div></a>

                <a href="result.php"><div class="bar">
                <button class="btn">Student Result</button>
                </div></a>

                <a href="logout.php"><div class="bar">

                    <button class="btn" >logout</button>

                <a>
                </div>
            </div>
            
                <div class="contant">
                    <h2 class="h3">Update Student Info</h2>
           
            <?php
                include 'connect.php';

                session_start();

                $id=$_GET['rn'];

                $sql= "SELECT * FROM result WHERE s_Id='$id' ";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

                    echo '
                    <form action="" method="POST">
                    <br><br>
                    <b><label for="name">Student Name :</label> <br>';
                    echo '<input class="input" type="text" value='.$row["s_Name"].'  name="name">';

                    $_SESSION['name1'] = $row["s_Name"];
                    
                    echo '<br><br>
                    <label for="name">Department :</label> <br>
                    <input class="input" type="text" value=' .$row["Department"]. ' name="depart">';

                    $_SESSION['Department'] = $row["Department"];

                    echo '<br><br>
                    <label for="name">Student Phone:</label> <br>
                    <input class="input" type="text" value='.$row["Phone_No"].' name="phone">';
                    
                    $_SESSION['Phone_No'] = $row["Phone_No"];
                    
                }  
            }?>

                    <br><br>
                    <input type="submit" class="add_btn" value="ADD STUDENT"></b>
                    </a>
                    </b>
                    </form>
                

                    <?php
                        if(isset($_POST['name']))
                        {

                            $name=$_POST['name'];
                            $dept=$_POST['depart'];
                            $phone=$_POST['phone'];

                            $sql= "UPDATE student SET s_Name= '$name' , Department ='$dept' ,Phone_No= '$phone' WHERE s_Id = '$id' ";
                            if (mysqli_query($conn, $sql)) {
                                echo "Update successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }

                            mysqli_close($conn);

                        }


                    ?>

                </div>

            </div>


        </div>

        
        
    </body>


</html>