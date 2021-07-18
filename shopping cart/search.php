<!doctype html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   
</head>
<body>


<?php
//fetch.php
require_once ('./php/component.php');
$host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "productdb";  
      
    $con = mysqli_connect($host, $user, $password, $db_name); 

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM producttb 
  WHERE product_name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM producttb ;
 ";
}

$result = mysqli_query($con, $query);


if(mysqli_num_rows($result) > 0)
{
    ?>

    <div class="container">
    <div class="row text-center py-5">
    <?php
        while($row = mysqli_fetch_array($result))
        {
        component($row['product_name'],$row['product_price'], $row['product_image'], $row['id']);
        }
 
 
}
?>
</div>
</div>

</body>
</html>