<?php
use app\Models\Article;
require_once '../app/config.php';


$article=new Article();

if(isset($_GET['delete']) && $_GET['delete']!=""){
    $id=$_GET['delete'];
    $article->delete($id);
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
<h1>Ajouter un article</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label>Titre : </label>
    <input type="text" name="titre"><br/>
    <label>Auteur : </label>
    <input type="text" name="auteur"><br/>
    <label>Categorie</label>
    <select name="categorie">
        <option >Informatique</option>
        <option >Science</option>
        <option >Sport</option>
    </select><br/>
    <label>Description</label>
    <textarea name="descri"></textarea><br/>
    <label>Etat : </label>
    <input type="radio" name="etat" value="public">Public<input type="radio" name="etat" value="privé">Privé<br/>
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
    $article->setPhoto($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'],'../web/uploads/'.$article->getPhoto());
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
    $article->save($data);
}
?>
<table class="table table-hover">
    <tr>
        <td>id</td>
        <td>Photo</td>
        <td>Titre</td>
        <td>Auteur</td>
        <td>Categorie</td>
        <td>Description</td>
        <td>Date creation</td>
        <td>Etat</td>
        <td>Action</td>
    </tr>

<?php
$data=$article->list();

while ($obj=$data->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <td><?= $obj['id']; ?></td>
        <td><img src="../web/uploads/<?= $obj['photo']; ?>" width="80" alt="Image Non Disponible"></td>
        <td><?= $obj['titre']; ?></td>
        <td><?= $obj['auteur']; ?></td>
        <td><?= $obj['categorie']; ?></td>
        <td><?= $obj['description']; ?></td>
        <td><?= $obj['datecreation']; ?></td>
        <td><?= $obj['etat']; ?></td>
        <td>
            <ul>
                <li><a href="edit_article.php?id=<?= $obj['id'] ?>">Edit</a></li>
                <li><a href="ajout_article.php?delete=<?= $obj['id'] ?>">Delete</a></li>
            </ul>
        </td>
    </tr>
    <?php
}

?>
</table>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

