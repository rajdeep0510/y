<?php session_start(); ?>   
<?php include("../config/config_session.php"); ?>
<?php include '../models/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>signup</title>
</head>
<body>
    <?php include './navbar.php'; ?>
    <form method="POST" class="flex items-center justify-center">
        <input type="text"
            id="username"
            name="username"
            class=" bg-gray-600 m-2 p-1 rounded"
            placeholder="Enter your username here"> 
        <input type="password"
            id="password"
            name="password"
            class=" bg-gray-600 m-2 p-1 rounded"
            placeholder="Enter your password here"> 
        <input type="text"
            id="email"
            name="email"
            class=" bg-gray-600 m-2 p-1 rounded"
            placeholder="Enter your email here">
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-1 p-1 rounded"
            name="submit">
            Submit
        </button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql_insert = "INSERT INTO accounts ( username, password, email ) VALUES ('$username', '$password', '$email')";

        try{
            mysqli_query($connection, $sql_insert);
            header("Location: login.php");
        }catch(mysqli_sql_exception $e){
            echo "could not create user". $e->getMessage();
        }
    }

    mysqli_close($connection);
    ?>
</body>
</html>