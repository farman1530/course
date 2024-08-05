<?php
session_start();
include('../connection.php');
$respose = ['status'=>'','message'=>''];
if (isset($_POST)) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = $conn->query("Select * from admin where username='$username' and password='$password' ");
    if (mysqli_num_rows($sql)>0) {
    $respose = ['status'=>'success','message'=>'data get successfull'];

     $data =    mysqli_fetch_assoc($sql);
     $_SESSION['admin'] = $data;
      
    }
    
}
echo json_encode($respose);
?>