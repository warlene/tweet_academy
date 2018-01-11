<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home_Tweet</title>
</head>
<body>
    <aside>
        <h1>Tweet</h1>

        <h2>Ajouter un tweet</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="content_tweet">Content :</label>
                <textarea type="file" name="content_tweet" id="content_tweet"  rows="10" cols="190"></textarea><br><br>

            </div>

            <div>
                <label for ="fileToUpload">Select image to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">

            </div>
            <input type="submit" name="add_tweet">
            <br><br>
        </form>
    </aside>



</body>
</html>




<?php
require_once('connexion.php');
//var_dump($_POST);
$tweet = $bdd->prepare("SELECT displayName, fullName, user.idUser,idUrlAvatar, tweetDate, TweetContent, imgUrl, idTweet FROM tweet INNER JOIN user ON tweet.idUser = user.idUser ORDER BY tweetDate DESC ");

$tweet->execute();
var_dump(isset($_FILES['fileToUpload']));
var_dump($_FILES['fileToUpload']);
var_dump($_FILES['fileToUpload']['name']);
var_dump(empty($_FILES['fileToUpload']['name']));
var_dump(isset($_FILES['fileToUpload']) AND !empty($_FILES['fileToUpload']['name']));
$extensionUpload = strtolower(substr(strrchr($_FILES['fileToUpload']['name'], '.'), 1));
var_dump($extensionUpload = strtolower(substr(strrchr($_FILES['fileToUpload']['name'], '.'), 1)));






while ($tweets  = $tweet->fetch()) {
var_dump("avatars/".$tweets['idUser'].".".$extensionUpload);
var_dump("avatars/".$_FILES['fileToUpload']['name']);
    ?>
    <div class="display_tweet">
        <?php
        if($tweets['idUrlAvatar'] != null) {
            echo $tweets['idUrlAvatar'];
        }
        ?>
        <span><strong>FullName : </strong><?= $tweets['fullName'] ?></span><br>
        <span><strong>Pseudo : </strong>@<?= $tweets['displayName'] ?></span><br>
        <span><strong>Tweet : </strong><?= $tweets['TweetContent'] ?></span><br>
        <span><strong>Date de publication : </strong><?= $tweets['tweetDate'] ?></span><br>
        <?php
        if($tweets['imgUrl'] != null) {
            ?> <img src="avatars/<?=$_FILES['fileToUpload']['name'];?>">
            <?php
        }
        ?>
        <a href="#">Repondre</a>
        <a href="#">Retweet</a>
        <a href="#">J'aime</a>

    </div>

    <?php
}


if(isset($_FILES['fileToUpload']) AND !empty($_FILES['fileToUpload']['name'])) {

    $tailleMax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['fileToUpload']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['fileToUpload']['name'], '.'), 1)); // recupere l'extension
        if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "avatars/".$_FILES['fileToUpload']['name'];
            $resultat = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $chemin);
            if($resultat) {
                $updateavatar = $bdd->prepare('INSERT INTO tweet( idUser, tweetContent, imgUrl) VALUES (?, ?, ? )');
                $updateavatar->execute(array( 1, $_POST['content_tweet'],$_FILES['fileToUpload']['name']));
                //header('Location: index.php');
            } else {
                $msg = "Erreur durant l'importation de votre photo de profil";
            }
        } else {
            $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    } else {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}

?>

Envoyer un message à @oumi.diedhiou
