<?php
    var_dump($_SESSION);
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
    require './components/index.view.php';
?>