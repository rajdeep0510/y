<?php
    include("./models/database.php");
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bootstrap demo</title>
</head>

<body class="bg-gray-700 text-white">
    <?php
    include './navbar.php';
    ?>
    <?php if ($_SESSION['is_logged_in'] == true) { ?>
    <form method="POST">
        <div class="flex items-center justify-center">
            <input type="text"
                id="message"
                name="message"
                class="w-full bg-gray-600 m-2 p-1 rounded"
                placeholder="Enter your message here">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold m-1 p-1 rounded"
                name="submit">
                Submit
            </button>
        </div>
    </form>
    <?php } ?>
</body>
</html>

<?php
    var_dump($_SESSION);
    if (isset($_POST['submit'])) {
        $message = $_POST['message'];
        $username = "@".$_SESSION['username'];
        $sql_insert = "INSERT INTO messages ( message, username ) VALUES ('$message', '$username')";
        
        try{
            if($username == ''){
                echo "write a message";
            }
            else{
            mysqli_query($connection, $sql_insert);    
            }
        }
        catch(mysqli_sql_exception){
                echo "could not sent message";
            }

    }
    $sql_select = "SELECT * FROM messages";
    $result = mysqli_query($connection, $sql_select);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message = $row['message'];
            $username = $row['username'];
            $dnt = $row['dnt'];
            echo "<div class='block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700'> <h5 class='mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white'> $message </h5> <p class='font-normal text-gray-700 dark:text-gray-400'> $username </p> </div>";
        }
    } else {
        echo "No messages";
    }

    mysqli_close($connection);

?>