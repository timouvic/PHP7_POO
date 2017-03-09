<?php
use app\Models\Article;
require_once '../app/config.php';
$article=new Article();

if(isset($_GET['id']) && $_GET['id']!=""){
    $id=$_GET['id'];
    $article->find($id);
    //echo $article;
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
<div class="container">
    <h1>Edit Article</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Titre : </label>
        <input type="text" name="titre" value="<?= $article->getTitre() ?>"><br/>
        <label>Auteur : </label>
        <input type="text" name="auteur"value="<?= $article->getAuteur() ?>"><br/>
        <label>Categorie</label>
        <select name="categorie">
            <option></option>
            <option <?php if($article->getCategorie()=='Informatique'){echo 'selected';} ?> >Informatique</option>
            <option <?php if($article->getCategorie()=='Science'){echo 'selected';} ?> >Science</option>
            <option <?php if($article->getCategorie()=='sport'){echo 'selected';} ?> >Sport</option>
        </select><br/>
        <label>Description</label>
        <textarea name="descri"><?= $article->getDescription() ?></textarea><br/>
        <label>Etat : </label>
        <input type="radio" name="etat" value="public" <?php if($article->getEtat()=='public'){echo 'checked';} ?> > Public <input type="radio" name="etat" value="privé" <?php if($article->getEtat()=='privé'){echo 'checked';} ?> > Privé <br/>
        <label >photo</label>
        <input type="file" name="photo"/><br/>
        <input type="submit" value="Ajouter" name="ok" class="btn btn-success">
    </form>
    <br/><hr/><br/>
    <?php

    if(isset($_POST['ok'])){
        $article->setTitre($_POST['titre']);
        $article->setAuteur($_POST['auteur']);
        $article->setDescription($_POST['descri']);
        $article->setEtat($_POST['etat']);
        $article->setCategorie($_POST['categorie']);
        if($_FILES['photo']['name']!=""){
            $article->setPhoto($_FILES['photo']['name']);
            move_uploaded_file($_FILES['photo']['tmp_name'],'../web/uploads/'.$article->getPhoto());
        }
        $datecreation=date("Y-m-d");
        $data=array(
            'titre'=>$article->getTitre(),
            'auteur'=>$article->getAuteur(),
            'description'=>$article->getDescription(),
            'categorie'=>$article->getCategorie(),
            'etat'=>$article->getEtat(),
            'photo'=>$article->getPhoto(),
            'datecreation'=>$datecreation,
        );
        echo $article;
        $article->edit($data);
    }
    ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

