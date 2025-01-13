<?php
include("./models/database.php");
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
    include './components/navbar.html';
    ?>
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
    <?php
    if (isset($_POST['submit'])) {
        $message = $_POST['message'];

        $sql_insert = "INSERT INTO message ( content ) VALUES ('$message')";
        
        try{
            mysqli_query($connection, $sql_insert);
           
            }catch(mysqli_sql_exception){
                echo "could not sent message";
            }

    }

    $sql_select = "SELECT * FROM message";
    $result = mysqli_query($connection, $sql_select);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='flex items-center justify-center bg-gray-600 m-2 p-1 rounded'>" . $row['content'] . "</div>";
        }
    } else {
        echo "No messages";
    }


    mysqli_close($connection);
    ?>
</body>

</html>