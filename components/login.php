<?php  include("./config/config.inc.php"); ?>
<?php session_start(); ?>
<?php include './models/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>signup</title>
</head>
<body>
    <?php 
        include './navbar.php';
    ?>
    <form method="POST">
        <div class="flex items-center justify-center">
            <input type="text"
                id="username"
                name="username"
                class="w-full bg-gray-600 m-2 p-1 rounded"
                placeholder="Enter your username here">
            <input type="password"
                id="password"
                name="password"
                class="w-full bg-gray-600 m-2 p-1 rounded"
                placeholder="Enter your password here">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-1 p-1 rounded"
                name="submit">
                Submit
            </button>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $sql_select_acc = "SELECT id, password FROM accounts WHERE username = '$username'";
        $result = mysqli_query($connection, $sql_select_acc);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($password === $row['password']) {
                echo "Logged in";
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_id'] = $row['id'];

                header("Location: /php/y/");
                exit();
            } else {
                echo "Invalid password";
            }
        } else {
            echo "Invalid username";
        }
    }
    ?>
    
</body>
</html>