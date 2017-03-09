<?php
use app\Models\User;
require_once '../app/config.php';


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
    <h1>Inscription</h1>
    <form method="post">
        <label >Email : </label><input type="email" name="mail"><br/>
        <label >Login : </label><input type="text" name="login"><br/>
        <label >Password : </label><input type="password" name="pwd"><br/>
        <input type="submit" value="s'inscrire" name="ok" />
    </form>

    <?php
    if(isset($_POST['ok'])){
        $user->setMail($_POST['mail']);
        $user->setLogin($_POST['login']);
        $user->setPwd($_POST['pwd']);

        $data=array(
            'mail'=>$user->getMail(),
            'login'=>$user->getLogin(),
            'pwd'=>$user->getPwd(),
        );

        $user->save($data);
    }
    ?>


</div>
</body>
</html>

