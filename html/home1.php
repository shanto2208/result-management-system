
<html>
    <head>
        <title>
            home
        </title>
        <link rel="stylesheet" href="css\home1.css">
    </head>

    <body >

        <h1 class="head1">Student Result Management System</h1>

        <div class="container">

        <a href="logout.php"><div class="logout">

                <button class="button" >logout</button>

            </div>
            </a>

            <div class="semester">

                <form method="POST">
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
                <table>
                    <tr>
                        <th>Course name</th>
                        <th>Quiz</th>
                        <th>Classwork</th>
                        <th>Mid</th>
                        <th>Final Exam</th>
                        <th>Total</th>
                        <th>Grade</th>
                    </tr>
    
                    <?php
                        include 'connect.php';

                        session_start();
                        if($_SESSION['varname']){
                        $id= $_SESSION['varname'];
                        

                        
   
                        if(isset ($_POST['seme'])){

                            $semester=$_POST['seme'];
                            $sql = "SELECT * FROM result WHERE Sid='$id' AND  Semester='$semester' ";

                            $result = mysqli_query($conn, $sql);



                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $total=0;
                                echo "<tr>";
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
    
                </table>
            </div>
            
        </div>

   
        
    </body>


</html>