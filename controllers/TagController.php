<?php 
include 'models/Model_tag.php';


class TagController {

	public function find_hashtag($tweetContent){
		$tag = new Tag;
		$idTweet = $tag->send_tweet_in_bdd($idUser, $tweetContent, $imgUrl, $idReTweet = null, $idReTweetFrom=null);
		var_dump($tweetContent);
		preg_match_all('/#[0-9a-z-A-Z]*/',$tweetContent,$hashtag);
		foreach($hashtag as $h){
			$result =  $tag->Stock_hastag($h);
			
    /*var_dump($h[0]);
    var_dump($h[1]);
    var_dump($h[2]);*/

}
if (isset($hashtag[0]) && !empty($hashtag[0])){
	/*return $hashtag ;*/
}
return null;
}
}

?>