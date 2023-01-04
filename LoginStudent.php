<?php


$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'SignInStudent.php';
    $uname = $_POST["uname"];
    $psw = $_POST["psw"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from mini where Name='$uname 'AND Password='$psw'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($psw, $row['psw'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['uname'] = $uname;
          
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