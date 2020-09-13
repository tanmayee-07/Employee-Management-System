<?php

require 'conn.php';
session_start();
if(!$_SESSION['u_name']){
    header('Location: index.php');
}
?>

<!DOCTYPE html><!--to work on HTML 5 -->
<html lang="en">
    <head>
        <meta charset="utf-8"><!--to tell the browser that this file is UTF-8 encoded-->
        
        <title>Welcome</title>
        <meta name="viewport" content="width=device-width,initial scale=1"><!--to control the page's dimensions and scaling i.e.to make the webpage responsive-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <style>
        body{
            background-image: url("https://images7.alphacoders.com/379/379370.jpg");
            background-size: cover;
        }
    </style>
    <body>
        <?php require "nav.php"; ?>

        <!--main content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"style="color: brown;"><strong>Employees</strong></div>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                            <li class="list-group-item"><a href="dash.php">View All Employees</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: brown;"><strong>Add Employee</strong></div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <?php 

                                $id=$_GET['e_id'];
                                $sql="SELECT * FROM employees WHERE e_id='$id' ";
                                $result=mysqli_query($conn,$sql);

                                if(mysqli_num_rows($result)>0){
                                    //output data of each row
                                    while($employee=mysqli_fetch_assoc($result)){ ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm" name="e_name" placeholder="Employee Name" value="<?php echo $employee['e_name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control input-sm" name="e_email" placeholder="Employee Email" value="<?php echo $employee['e_email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control input-sm" name="e_phone" placeholder="Employee Phone Number" value="<?php echo $employee['e_phone']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" class="btn btn-sm btn-success" value="Update Employee" name="e_update">
                                    </div>

                                <?php }
                                }else{
                                    echo "0 results";
                                }

                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

        if(isset($_POST['e_update'])){
            $e_name=$_POST['e_name'];
            $e_email=$_POST['e_email'];
            $e_phone=($_POST['e_phone']);

            $sql="UPDATE employees SET e_name='$e_name', e_email='$e_email', e_phone='$e_phone' WHERE e_id='$id' ";

            if(mysqli_query($conn,$sql)){
                header("Location: dash.php");
            }else{
                echo "Error updating record: ".mysqli_error($conn);
            }

        }
        ?>
      
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"  integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </body>
</html>