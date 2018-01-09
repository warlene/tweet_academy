<?php
class Bdd{

	const HOST = "localhost";
	const DBNAME = "registration";
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

}
?>
