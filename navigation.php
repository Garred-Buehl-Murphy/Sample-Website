<?php
    include('sql_connect.php');
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $login_username = mysqli_real_escape_string($conn, $_POST['login_username']);
        $login_password = mysqli_real_escape_string($conn, $_POST['login_password']); 
        
        //I was having difficulty figuring out how to get password_hash() to work correctly.  I will include it in a future update.
        $sql = "SELECT * FROM users WHERE username = '$login_username' and passcode = '$login_password'";
        $result = mysqli_query($conn, $sql);

        if ($result != false){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
            $count = mysqli_num_rows($result);
        
        
            $_SESSION['login_user'] = $login_username;
           
           header("location: add_cars.php");
        } else {
           $error = "Your Login Name or Password is invalid";
        }
    }
?>



<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Sample Website</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form class="form-inline" action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" name="login_username" >
                        <input type="password" class="form-control" placeholder="Password" name="login_password" >
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</nav>