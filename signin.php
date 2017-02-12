<?php

ob_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <title>Signin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
   
    <style>
    html, body{
        height:100%;
    }

    .container{
        height:100%;

        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    </style>

</head>
<body>


    <div class="container">
      
      <form action="signin.php" method="POST">
            <div class="form-group row">
                <h2 class="form-signin-heading offset-sm-4"> Please sign in</h2>
            </div>

            <div class="form-group row">
                <label for="username" class="col-sm-2 offset-sm-2 col-form-label">Username</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control " name="username" placeholder="Username">
                </div>
            </div>


            <div class="form-group row">
                <label for="password" class="col-sm-2 offset-sm-2 col-form-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>

        
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-4">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>


       <?php
 
       if ($_SERVER['REQUEST_METHOD']== 'POST')
       {

            if (empty($_POST['username']) || empty($_POST['password']))
            {
                print "<div class=\"row\">
                        <div class=\"col-sm-6 offset-sm-4\">
                            <p>You have to enter both a username and a password!</p>
                        </div>
                      </div>";
            }
            else{
                $username= $_POST['username'];
                $password= $_POST['password'];

                //Print"Username is: $username, password is: $password";
               
                
                $users = [
                    'chy_613@hotmail.com' => '1'
                ];
                
                 error_log();

                if(isset($users[$username]) && $users[$username] ==$password)
                {
                    session_start();

                    $_SESSION['username'] = $username;

                    header('Location: admin.php');

                    exit;
                }
                else{

                    
                }
            }


                

                     
       }




       ?>
 
    </div>
     
    
</body>
</html>