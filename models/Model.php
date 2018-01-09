<?php
class Model{

	const HOST = "localhost";
	const DBNAME = "tweet_academie";
	const NAME ="root";
	const PSW ="";

	private static $instance = NULL;

	public static function bdd_connect(){
		if (!isset (self::$instance)){
			$option = array (
				PDO :: ATTR_PERSISTENT => true,
				PDO :: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			self::$instance =  new PDO ('mysql:host='.SELF::HOST.';dbname='.SELF::DBNAME,SELF::NAME,SELF::PSW,$option);
		}
		return self::$instance;
	}

  public static function clean_data($data){
    $clean_data = trim($data);
    return $clean_data;
  }

  public static function clean_displayname($data){
    $clean_data = Model::clean_data($data);
    $temp = explode(' ', $clean_data);
    $displayname = "@" . implode($temp);
    return $displayname;
  }
}
?>
