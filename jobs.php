<?php
    $user = "jordan"
    $root = "localhost"
    $pass = "jordaan123"
    $dbname = 'schemaRecords';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $job_title = $_SERVER['job_title '];
        $job_description = $_SERVER['job_description'];
        $category= $_SERVER['category'];
        $company_name = $_SERVER['company_name'];
        $company_location = $_SERVER['company_location'];
        $date_posted = $_SERVER['date_posted'];
       
        if($job_title == "" || $job_description == "" || $category == "" || $company_name == "" || $company_location == "" || date_posted == ""){
            echo "Fields cannot be empty";
        }else{
            $conn = new mysqli($root,$user,$pass,$dbname);
            
            $stmt = $conn->prepare("INSERT INTO Jobs(job_title , job_description, category, company_name, company_location, date_posted) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss",$job_title , $job_description, $category, $company_name, $company_location, $date_posted);
            $stmt->execute();
            
            
            echo "<p style='background:cyan;color:white;width:100%'>New records created successfully</p>";
            include 'index.php';
        }
    }
        
?>