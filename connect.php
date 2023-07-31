<?php
//hostname = localhost, username = root, password = , database name = myshop
$con=mysqli_connect('localhost','root','','myshop');
if($con){
    
}else{
    die(mysqli_error($con));
}
?> 