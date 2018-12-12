<?php
    session_start();
    
    $user = "jordan";
    $root = "localhost";
    $pass = "jordan123";
    $dbname = 'schemaRecords';

    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $date_joined = date("Y-m-d");
        $hash_password =  bin2hex($password); 
        
       if($firstname == "" || $lastname == "" || $password == "" || $email == "" || $telephone == ""){
            echo "Fields cannot be empty";
        }else{
            try{
                $conn = new mysqli($root,$user,$pass,$dbname);
                $stmt = $conn->prepare("INSERT INTO Users(firstname, lastname, password, email, telephone, date_joined) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss",$firstname,$lastname,$hash_password,$email,$telephone,$date_joined);
                $stmt->execute();
                
                echo "<p style='background:cyan;color:white;width:100%'>New records created successfully</p>";
                include 'index.php';
            }catch(Exception $e){
                echo "Could not connect";
            }
        }
    }
        
?>