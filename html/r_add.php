

<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" href="css\r_result.css">
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

                    <button class="btn" type="submit">logout</button>

                <a>

            </div>
            </div>

            <div class="contant">
            <h2 class="h3">Add Student Result</h2>
                <form action="" method="POST">

                <table>
                    <tr>
                        <th>Id</th>
                        <th>semester</th>
                        <th>Course Name</th>
                        <th>Quiz</th>
                        <th>Classwork</th>
                        <th>Mid</th>
                        <th>Final</th>
                    </tr>

                    <tr>
                        <td> <input type="text" name="id"> </td>
                        <td> <select name="seme" >
                        <option value="">----- </option>
                        <option value="summer 2022">summer 2022 </option>
                        <option value="summer 2020">summer 2020 </option>
                        <option value="summer 2021">summer 2021 </option>
                        
                    </select> </td>
                        <td> <select name="dep" >
                        <option >----- </option>
                        <option value="EEE 103">EEE 103</option>
                        <option value="EEE 106">EEE 106 </option>
                        <option value="EEE 110">EEE 110</option>
                        <option value="EEE 246">EEE 246 </option>
                        <option value="BBA 103">BBA 103</option>
                        <option value="BBA 106">BBA 106 </option>
                        <option value="BBA 110">BBA 110</option>
                        <option value="BBA 246">BBA 246 </option>
                        <option value="CSE 103">CSE 103</option>
                        <option value="CSE 106">CSE 106 </option>
                        <option value="CSE 110">CSE 110</option>
                        <option value="CSE 246">CSE 246 </option>
                        <option value="CSE 347">CSE 347 </option>
                        <option value="CSE 350">CSE 350</option>
                        <option value="CSE 360">CSE 360</option>
                        <option value="CSE 479">CSE 479 </option>
                    </select>
                        <td> <input type="text" name="quzi"> </td>
                        <td> <input type="text" name="ck"> </td>
                        <td> <input type="text" name="mid"> </td>
                        <td> <input type="text" name="final"> </td>
                    </tr>

                </table>  
                
                <input type="submit" value="ADD Result"></b>
                </form>


                <?php
                    include 'connect.php';
                    session_start();

                   ## if($_SESSION['name']){
                    
                    if(isset($_POST['id']))
                    {

                        $id=$_POST['id'];
                        $seme=$_POST['seme'];
                        $dep=$_POST['dep'];
                        $quzi=$_POST['quzi'];
                        $ck=$_POST['ck'];
                        $mid=$_POST['mid'];
                        $final=$_POST['final'];

                        $sql= "SELECT * FROM student WHERE s_Id='$id'";
                        $result=mysqli_query($conn, $sql);
                        

                        if (mysqli_num_rows($result)>0) {
                          
                            while($row = mysqli_fetch_assoc($result)) {
                                $row1 = $row["s_Name"];
                                $row2 = $row["Department"];
                            }

                            $sql="INSERT INTO result (Sname,Sid, Semester, dep ,cName, Quiz,Classwork, Mid, Final)

                            VALUE ('$row1','$id','$seme','$row2','$dep', '$quzi','$ck','$mid','$final')";
                            if (mysqli_query($conn, $sql)) {
                                echo"Students  result created";

                            } else {
    
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                
                            }

                        }  
                        mysqli_close($conn);
                    }#else{
                     #   header("location:login.php");
                    #}
                        
                #}
                ?>
                
            </div>

        </div>
        
        
    </body>


</html>