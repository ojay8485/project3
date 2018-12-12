<!DOCTYPE html>
<?php
    $user = "jordan";
    $root = "localhost";
    $pass = "jordan123";
    $dbname = 'schemaRecords';

    $q = $_GET['q'];
    
    
    $conn = new mysqli($root,$user,$pass,$dbname);
    
    $stmt = "SELECT * FROM Jobs WHERE job_title = '$q';";
    $result = $conn->query($stmt);
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav>
        <p>HireMe</p>
    </nav>
    <div class="container">
        <div class="box0">
            <a href="index.php"><i class="fas fa-home"></i>Home</a> <br>
            <a href="add_user.php"><i class="fas fa-user-plus"></i>Add User</a> <br>
            <a href="new_job.php"><i class="fas fa-edit"></i>New Job</a> <br>
            <a href="login.php?logout=true"><i class="fas fa-power-off"></i>Logout</a>

        </div>
        <?php while($row = $result->fetch_assoc()) { ?>
        <div class="box1">
             <div id="post">
                <h1><?php echo $row["job_title"]; ?></h1>
                <button onclick='window.location = "apply_job.php?j=<?php echo $row["id"]; ?>&u=<?php echo $_SESSION["user"]; ?>"'>Apply Now</button>
                <h4 style="color:gray">Posted <?php echo date("M d, Y", strtotime($row["date_posted"]));?> <br> <?php echo $row["category"]; ?>  </h4>
                <br>
                <h3><?php echo $row["company_name"]; ?><br><?php echo $row["company_location"]; ?></h3>
                <hr>
                <h2>Job Description</h2>
                <p><?php echo $row["job_description"]; ?></p>
            </div>
            
            
            <?php } ?>
        </div>
        
</body>
</html>