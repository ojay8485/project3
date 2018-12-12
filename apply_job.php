<?php
    $user = "jordan";
    $root = "localhost";
    $pass = "jordan123";
    $dbname = 'schemaRecords';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        $job_id = (int)$_GET['j'];
        $user_id = (int)$_GET['u'];
        $date_applied = date("Y-m-d");
       
    

        if($_GET['j'] == "" || $_GET['u'] == ""){
            echo "Fields cannot be empty";
        }else{
            try{
            $conn = new mysqli($root,$user,$pass,$dbname);
            
            echo $job_id," ", $user_id," ", $date_applied;
                
            $stmt = $conn->prepare("INSERT INTO Jobs_Applied_For (job_id, user_id, date_applied) VALUES (?, ?, ?)");
            $stmt->bind_param("iis",$job_id, $user_id, $date_applied);
            $stmt->execute();
            
            echo "<p style='background:cyan;color:white;width:100%'>New records created successfully</p>";
            include 'index.php';
            }catch(Exception $e){
                echo "Could not connect";
            }
        }
    }
        
?>