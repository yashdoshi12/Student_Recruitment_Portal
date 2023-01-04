<?php
    $Name = $_POST['Name'];
    $Password = $_POST['Password'];
    $PRN = $_POST['PRN'];
    $Email = $_POST['Email'];
    $Birthday = $_POST['Birthday'];
    $Dept = $_POST['Dept'];
    $Year = $_POST['Year'];
    $Skill = $_POST['Skill'];

    // Database connection
    $conn = new mysqli('localhost','root','','project');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into mini(Name,Password,PRN, Email,Birthday,Dept,Year,Skill) values(?, ?, ?, ?, ?, ?,?,?)");
        $stmt->bind_param("ssisssss", $Name, $Password, $PRN, $Email, $Birthday,$Dept,$Year,$Skill);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration successfully...";
        $stmt->close();
        $conn->close();
    }
?>