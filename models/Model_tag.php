<?php
require_once('models/Model.php');

class Tag {

public function Stock_hastag($h){
$bdd = Model::bdd_connect();
$sql = $bdd->prepare("INSERT INTO tag (idTweet, tagName) VALUES (?, ?)");
$result = $sql->execute([$idTweet, $tagName]);
return $result;
}


}