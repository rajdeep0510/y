<?php  include("./config/config.ini.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>

<body>

  <header>
    <nav class="bg-blue-600 text-white p-4">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-xl font-bold">X Clone</a>
        <!-- Links -->
        <div class="space-x-4">
          <a href="../index.php" class="hover:underline">Home</a>
          <?php if ($_SESSION['is_logged_in'] == true) { ?>
          <a href="./components/logout.php" class="hover:underline">Logout</a>
          <?php } else { ?>
          <a href="./components/login.php" class="hover:underline">Login</a>
          <?php } ?>
          <a href="#" class="hover:underline">About</a>
          <a href="#" class="hover:underline">Profile</a>
        </div>
      </div>
    </nav>
  </header>
  <?php include("./models/database.php"); ?>

</body>

</html>