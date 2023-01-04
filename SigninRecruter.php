<?php
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $linkedin = $_POST['linkedin'];
    $psw = $_POST['psw'];
    $email = $_POST['email'];
    $vacancies = $_POST['vacancies'];
    $Skill = $_POST['Skill'];
    $salary = $_POST['salary'];
    $Job = $_POST['Job'];

    // Database connection
    $conn = new mysqli('localhost','root','','recruter');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into com(name,uname,linkedin,psw,email,vacancies,Skill,salary,Job) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssisss", $name,$uname,$linkedin,$psw,$email,$vacancies,$Skill,$salary,$Job);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration successfully...";
        $stmt->close();
        $conn->close();
    }
?>