<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-dark ">
<?php session_start();
echo '    <h1 class="mx-auto text-center col col-5 text-white font"> hello '.$_COOKIE['name'].'   </h1>';
?>
<div class="font col col-5 mx-auto text-center">
    <a href="logout.php">
                <button type="submit" class="font rounded btn btn-primary">خروج از حساب کاربری</button>
    </a>
</div>
</body>
</html>