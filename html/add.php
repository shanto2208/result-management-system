


<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" href="css\add.css">
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
                    <button href="add.php" class="btn1">Add Student</button>
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
            <h2 class="h3">Add new Student</h2>
                <form action="add.php" method="POST">

                    <br><br>
                    <b><label for="name">Student Name :</label> <br>
                    <input class="input" type="text" name="name">

                    <br><br>
                    <label for="name">Student Id :</label> <br>
                    <input class="input" type="text" name="id">

                    <br><br>
                    <label for="name">Student Email :</label> <br>
                    <input class="input" type="text" name="email">

                    <br><br>
                    <label for="seme">Department :</label> <br>
                    <select name="seme" class="seme" >
                        <option value="">----- </option>
                        <option value="CSE">CSE </option>
                        <option value="EEE">EEE</option>
                        <option value="BBA">BBA</option>
                    </select>

                    <br><br>
                    <label for="name">Phone No :</label> <br>
                    <input class="input" type="text" name="phone">
                    
                    <br><br>
                    <input type="submit" class="add_btn" value="ADD STUDENT"></b>
                    
                </form>


                <?php
                    include 'connect.php';
                    session_start();

                    if($_SESSION['name']){
                        
                    
                    if(isset($_POST['name']))
                    {

                        $semester=$_POST['name'];
                        $id=$_POST['id'];
                        $email=$_POST['email'];
                        $dept=$_POST['seme'];
                        $phone=$_POST['phone'];
                        
       

                        $sql= "SELECT * FROM student WHERE s_Email='$email'";
                        $result=mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result)==0) {

                            $sql2= "SELECT * FROM student WHERE s_Id='$id'";
                            $result1=mysqli_query($conn, $sql2);
                            if(mysqli_num_rows($result1)==0)

                            {
                                
                                $sql="INSERT INTO student (s_Name,	s_Id, s_Email, Department ,Phone_No )

                                VALUE ('$semester','$id','$email', '$dept','$phone')";

                                if (mysqli_query($conn, $sql)) {
                                    echo"New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                
                                }

                            }
                            else{

                                if (mysqli_query($conn, $sql2)) {

                                
                                    echo"this student id already used";
        
                                } else {
        
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    
                                }


                            }
                                                 
                        
                            
                           
                        }
                        else{

                            if (mysqli_query($conn, $sql)) {

                                
                                echo"this email id already used";
    
                            } else {
    
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                
                            }

                            }
                        mysqli_close($conn);
                        
                        }
                    }
                    else{
                        header("location:login.php");
                    }
                        
                    
                ?>
                
            </div>

        </div>
        
        
    </body>


</html>