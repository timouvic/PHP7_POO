<?php
use app\Models\User;
require_once '../app/config.php';

if(isset($_SESSION['admin']) && $_SESSION['admin']['connect']!=""){
    header('location:profile.php');
}

$user=new User();
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

<div class="container">
    <h1>Authentification</h1>
    <form method="post">
        <label>Login/Email : </label><input type="text" name="motcle"><br/>
        <label>Password : </label><input type="password" name="pwd"><br/>
        <input type="submit" name="ok" value="Connect"/>
    </form>
</div>
<?php
//print_r($_SESSION);
if (isset($_POST['ok'])){
    $motcle=$_POST['motcle'];
    $pwd=$_POST['pwd'];

    $user->connect($motcle,$pwd);
}

?>
</body>
</html>
