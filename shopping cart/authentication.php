<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from registeration where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){
            
            if(isset($_POST['rememberme']))
            {
                setcookie('usercookie',$username, time()+60*60*7);
                setcookie('passcookie',$password, time()+60*60*7);
            }
            setcookie('Username',$username, time()+60*60*7);
            session_start();
            $_SESSION['Username']=$username;
            header("location: firstpage.php");
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  
