<!DOCTYPE html>
<?php
    session_start();
    $user = "jordan";
    $root = "localhost";
    $pass = "jordan123";
    $dbname = 'schemaRecords';
    
    if((int)$_SESSION['user'] <= 0){
        include 'login.html';
    }else{
        $conn = new mysqli($root,$user,$pass,$dbname);
        
        $stmt = "SELECT * FROM Jobs";
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

        <div class="box1">

            <div id="post">
                <h1>Dashboard</h1>
                <a href="new_job.html"><button>Post a Job</button></a>
            </div>
           
            <h3 style="font-family:Arial, Helvetica, sans-serif">Available Jobs</h3>
            
            <table>
                <tr>
                    <th>Company</th>
                    <th>Job Title</th>
                    <th>Category</th>
                    <th>Date</th>
                </tr>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo "  ";echo $row["company_name"]; ?></td>
                        <td id="link" onclick='window.location = "job_detail.php?q=<?php echo $row["job_title"] ?>";'><?php echo $row["job_title"]; ?></td>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["date_posted"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
            
            <h3 style="font-family:Arial, Helvetica, sans-serif; padding-top:2em;">Jobs Applied For </h3>
            <table>
                    <tr>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Category</th>
                        <th>Date</th>
                    </tr>
                    <?php 
                         $stmt = "SELECT * FROM Jobs JOIN Jobs_Applied_For ON Jobs.id = Jobs_Applied_For.job_id";
                         $result = $conn->query($stmt);
                         while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo "  ";echo $row["company_name"]; ?></td>
                        <td id="link" onclick='window.location = "job_detail.php?q=<?php echo $row["job_title"] ?>";'><?php echo $row["job_title"]; ?></td>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["date_posted"]; ?></td>
                    </tr>
                <?php }?>
                </table>


        </div>
    </div>
</body>
</html>
<?php }?>