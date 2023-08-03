<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" href="css\s_list.css">
    </head>

    <body>
        <div class="student">

                <form method="POST">
                    <label >Department Name:</label>
                    <select name="seme" >
                        <option >----- </option>
                        <option value="CSE">CSE </option>
                        <option value="EEE">EEE </option>
                        <option value="BBA">BBA </option>
                    </select>
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>DELETE</th>
                        <th>UPDATE</th>
                    </tr>
                    
    
                    <?php
                        include 'connect.php';
                        session_start();

                        if($_SESSION['name']){


                        $id= $_SESSION['name'];

                        if(isset($_POST['seme']))
                        {
                            $dep=$_POST['seme'];
   

                            $sql = "SELECT * FROM student WHERE Department='$dep' ";

                            $result = mysqli_query($conn, $sql);

                            $i=1;

                            if (mysqli_num_rows($result) > 0) {
                             // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                
                                    echo "<tr>";


                                    echo "<td>".$i."</td>";
                                    echo "<td>".$row["s_Name"]."</td>";

                                    echo "<td>".$row["s_Id"]."</td>";

                                    echo "<td>".$row["s_Email"]."</td>";

                                    echo "<td>".$row["Department"]."</td>";

                                    echo "<td>".$row["Phone_No"]."</td>";

                                    echo "<td class='delete'><a href='delete.php?rn=$row[s_Id]'>DELETE</a></td>";
                                    
                                    echo "<td class='update'><a href='update.php?rn=$row[s_Id]'>UPDATE</a></td>";


                                    $i=$i+1;
                                
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
  
    </body>


</html>