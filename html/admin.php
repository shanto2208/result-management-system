<?php
                        include 'connect.php';

                        
                        
?>


<html>
    <head>
        <title>
            Admin
        </title>
        <link rel="stylesheet" href="css\admin.css">
    </head>

    <body>

    <div class="head">
            <h1 class="head_h1">Result Management System</h1>    
        </div>

        <div class="head2">

            <div class="sidebar">
                
                <b><a href="admin.php"><div class="bar1" name="List">
                    <button class="btn1" name="List" >Student List</button>
                </div></a>

                <a href="add.php"><div class="bar2">
                    <button href="add.php" class="btn">Add Student</button>
                </div></a>

                <a href="result.php"><div class="bar3">
                <button class="btn">Student Result</button>
                </div></a>

                <a href="logout.php"><div class="bar4">

                    <button class="btn" >logout</button>
                    
                <a></b>


            </div>
            </div>

            <div class="contant">

            <?php 

                include 's_list.php';
        
            ?>

            </div>


        </div>

        
        
    </body>


</html>