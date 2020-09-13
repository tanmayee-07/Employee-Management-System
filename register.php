<?php require 'conn.php' ?>
<!DOCTYPE html><!--to work on HTML 5 -->
<html lang="en">
    <head>
        <meta charset="utf-8"><!--to tell the browser that this file is UTF-8 encoded-->
        
        <title>Register</title>
        <meta name="viewport" content="width=device-width,initial scale=1"><!--to control the page's dimensions and scaling i.e.to make the webpage responsive-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    </head>
    <style>
        body{
            background-image: url("https://i.gifer.com/Uq1t.gif");
            background-size: cover;
        }
        .App-header{
            background-color: black;
            height: 200px;
            padding: 20px;
            color: #fff;
        }
        .App-logo{
            height:50px;
            width:50px;
        }
        @media only screen and (max-width:1100px) {
            .App-title{
                font-size: 3rem;
            }
        @media only screen and (max-width:600px) {
            .App-title{
                font-size: 2rem;
            }
        }
    </style>
    <body>
        <header class="App-header">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Tesseract.gif" class="App-logo" alt="logo">
            <h1 class="App-title">Welcome To Employee Management System</h1>
        </header>
        <!--register-->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
                    <div class="panel panel-default" style="margin-top: 50px;">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            <form action=""  method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control input-sm" name="u_email" required placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-sm" name="u_name" required placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-sm" name="u_pass" required placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-sm" name="u_reg" value="Register">
                                    <a href ="index.php" class="btn btn-info btn-sm">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--register-->
        <?php

        if(isset($_POST['u_reg'])){
            $u_email=$_POST['u_email'];
            $u_name=$_POST['u_name'];
            $u_pass=md5($_POST['u_pass']);

            $sql="INSERT INTO users (u_email,u_name,u_pass) VALUES ('$u_email','$u_name','$u_pass')";

            if(mysqli_query($conn,$sql)){
                echo "<script>alert('Registered successfully!');</script>";
            }else{
                echo "Error: ",$sql,"<br>",mysqli_error($conn);
            }

        }
        ?>


        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
