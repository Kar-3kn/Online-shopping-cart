<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    $email = $_POST['email']; 
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $email = stripcslashes($email);
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        $email = mysqli_real_escape_string($con, $email);  
      
        $query = "INSERT INTO registeration (username , email, password) 
  			  VALUES('$username', '$email', '$password')";
               $result= mysqli_query($con, $query);
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                 $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  

  	


