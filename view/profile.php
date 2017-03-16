<?php
use app\Models\User;
require_once '../app/config.php';

$user=new User();
if(isset($_SESSION['admin']) && $_SESSION['admin']['user']!=""){
    $user->find($_SESSION['admin']['user']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <link rel="stylesheet" href="../web/css/style.css"/>

</head>
<body>
<div class="contaier">
    <h1>Profile</h1>
    <?php
        echo $user;
    ?>
    <br/>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
