<?php
session_start();

    if((int)$_SESSION['user'] != 0){
        include 'index.php';
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
            <a href="login.html"><i class="fas fa-power-off"></i>Login</a>

        </div>

        <div class="box1">

            <h1>New User</h1>
            <form action='user.php' method='POST'>
                <label for="">Firstname</label> <br>
                <input type="text" name="firstname"> <br>

                <label for="">Lastname</label> <br>
                <input type="text" name="lastname"> <br>

                <label for="">Password</label> <br>
                <input type="password" name="password"> <br>

                <label for="">Email</label> <br>
                <input type="email" placeholder="e.g. mary.jane@example.com" name="email"> <br>

                <label for="">Telephone</label> <br>
                <input type="text" placeholder="e.g. 876-999-8989" name="telephone"> <br>

                <input id="button" type="submit">

            </form>
        </div>
    </div>
   
    
</body>
</html>
<?php } ?>