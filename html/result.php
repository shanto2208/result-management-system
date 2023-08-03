<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" href="css\result.css">
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
                <button class="btn1">Student Result</button>
                </div></a>
                
                <a href="logout.php"><div class="bar">

                    <button class="btn" >logout</button>

                <a>

            </div>
            </div>

            <div class="contant">






            <form method="POST">
                    <label >Course Name:</label>
                    <select name="dept" >
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
                    <br><br>

                    <label >Semester Name:</label>
                    <select name="seme" >
                        <option value="">----- </option>
                        <option value="summer 2022">summer 2022 </option>
                        <option value="summer 2020">summer 2020 </option>
                        <option value="summer 2021">summer 2021 </option>
                    </select>
                    <br><br>
                    <input type="submit" value="Submit">
                </form>


                
                <button class="button"><a href="r_add.php">ADD Result </a></button>
                


                <table>
                    <tr>
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Quiz</th>
                        <th>Classwork</th>
                        <th>Mid</th>
                        <th>Final</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>DELETE</th>       

                    </tr>

                    <tr>

                    
                    <?php
                        include 'connect.php';
                        session_start();

                        if($_SESSION['name']){

                        $id= $_SESSION['name'];
                        $i=1;

                        if(isset($_POST['seme']))
                        {
                            $seme=$_POST['seme'];
                            $dep=$_POST['dept'];

                            $sql = "SELECT * FROM result WHERE cName='$dep'	And  Semester='$seme' ";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $total=0;
                                    echo "<tr>";
                                    echo "<td>".$i."</td>";
                                    $i++;
                                    echo "<td>".$row["Sname"]."</td>";
                                    echo "<td>".$row["Sid"]."</td>";
                                    echo "<td>".$row["Semester"]."</td>";
                                    echo "<td>".$row["dep"]."</td>";
                                    echo "<td>".$row["cName"]."</td>";
                                    echo "<td>".$row["Quiz"]."</td>";
                                    echo "<td>".$row["Classwork"]."</td>";
                                    echo "<td>".$row["Mid"]."</td>";
                                    echo "<td>".$row["Final"]."</td>";
                                    $total= $row["Quiz"]+$row["Classwork"]+$row["Mid"]+$row["Final"];
                                    echo "<td>".$total."</td>";
                                

                                if($total>=97 && $total<=100)
                                {
                                    echo "<td>A+</td>";
                                }
                                elseif($total>=90 && $total<97)
                                {
                                    echo "<td>A</td>";

                                }
                                elseif($total>=87 && $total<90)
                                {
                                    echo "<td>A-</td>";

                                }elseif($total>=83 && $total<87)
                                {
                                    echo "<td>B+</td>";

                                }elseif($total>=80 && $total<83)
                                {
                                    echo "<td>B</td>";

                                }elseif($total>=77 && $total<80)
                                {
                                    echo "<td>B-</td>";

                                }elseif($total>=73 && $total<77)
                                {
                                    echo "<td>C+</td>";

                                }elseif($total>=70 && $total<73)
                                {
                                    echo "<td>C</td>";

                                }elseif($total>=67 && $total<70)
                                {
                                    echo "<td>C-</td>";

                                }elseif($total>=63 && $total<67)
                                {
                                    echo "<td>D+</td>";

                                }elseif($total>=60 && $total<63)
                                {
                                    echo "<td>D</td>";

                                }elseif($total<60)
                                {
                                    echo "<td>F</td>";
                                }
                                echo "<td class='delete'><a href='r_delete.php?rn=$row[Sid]'>DELETE</a></td>";
                                

                                "</tr>";
                                
                                    "</tr>";
                                }
                            }


                        }
                        
                        mysqli_close($conn);
                        }
                        else{
                            header("location:login.php");
                        }
                        ?>
                    </tr>
                       
                        
    
                </table>


                
            </div>


        </div>

        
        
    </body>


</html>