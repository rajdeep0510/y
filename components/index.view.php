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
    include './components/navbar.php';
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