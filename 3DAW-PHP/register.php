<!DOCTYPE html>

<?php
include('server.php');






?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>

<body>
    <div class="header">

    </div>
    <form method="POST" action="server.php">
   
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php  $username; ?>">
        </div>
        </div>

        <div class=" input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php  $email;  ?>">
        </div>


        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" value="<?php  $password_1;  ?>">
        </div>


        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2" value="<?php  $password_2;  ?>">
        </div>
        <div class="input-group">

            <button type="submit" name="register" class="btn-primary-black">Register </button>
        </div>

        <p>
            Already a member? <a href="login.php"> Sign In</a>
        </p>


    </form>
</body>

</html>