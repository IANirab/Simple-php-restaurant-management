<?php 

class session 
{
	public static function init(){
		session_start();
	}

	public static function set($key,$val){
		$_SESSION['$key'] = $val;
	}

	public static function get($key){
		if (isset($_SESSION['$key'])) {
			return $_SESSION['$key'];
		} else {
			return false;
		}
	}

	public static function checksession(){
		self::init();
		if (self::get("login")== false) {
			self::destory();
			header("location:signin.php");
		}
	}

	public static function destory(){
		session_destroy();
	}
}
?>