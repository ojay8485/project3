<?php
    $user = "jordan";
    $root = "localhost";
    $pass = "jordan123";
    $dbname = 'schemaRecords';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
         $l = $_GET['logout'];
         if($l == 'true'){
            $_SESSION['user'] = 0;
         }
         include 'login.html';
    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $email= $_POST['email'];
        $password = $_POST['password'];
        $t_password = bin2hex($password); 

        if($_POST['email'] == "" || $_POST['password'] == "" ){
            echo "<p style='background:red;color:white;width:100%'>Fields cannot be empty</p>";
            include 'index.php';
        }else{
            $conn = new mysqli($root,$user,$pass,$dbname);

            $stmt = "SELECT * FROM Users WHERE email='$email' AND password='$t_password';";
            $result = $conn->query($stmt);
            
            while($row = $result->fetch_assoc()) { 
                $_SESSION['user'] = $row['id'];
            }
            
            include 'index.php';
        }
    }
        
?>