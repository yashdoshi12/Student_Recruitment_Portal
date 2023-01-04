<?php


$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'SignInStudent.php';
    $Name = $_POST["Name"];
    $Password = $_POST["Password"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from mini where Name='$Name 'AND Password='$Password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($Password, $row['Password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $Name;
                header("location: welcome.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>