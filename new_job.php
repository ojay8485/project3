<?php
session_start();

    if((int)$_SESSION['user'] <= 0){
        include 'login.html';
    }else{
?>
<!DOCTYPE html>
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

            <h1>New Job</h1>
            <form action='jobs.php' method='POST'>
                <label for="" >Job Title</label> <br>
                <input name="job_title" type="text" placeholder="e.g. Senior Designer or Product Manager"> <br>

                <label for="">Job Description</label> <br>
                <textarea name="job_description" cols="82" rows="10"></textarea> <br>

                <label for="">Category</label> <br> <br>
                <select name="category">
                    <option value="">Category</option>
                    <option value="Sales & Marketing">Sales & Marketing</option>
                    <option value="Programming">Programming</option>
                    <option value="Business & Management">Business & Management</option>
                    <option value="Design">Design</option>
                    <option value="Customer Support">Customer Support</option>
                    <option value="DevOps & Sysadmin">DevOps & Sysadmin</option>
                </select> <br>
               

                <label for="">Company</label> <br>
                <input type="text" name="company_name"> <br>

                <label for="">Job Location</label> <br>
                <input type="text" name="company_location" placeholder="e.g. Kingston, Jamaica"> <br>

                <input id="button" type="submit">
            </form>
        </div>
    </div>
   
    
</body>
</html>
<?php } ?>