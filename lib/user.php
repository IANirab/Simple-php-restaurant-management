<?php 
 include_once "config/config.php"; 
 include_once "lib/Database.php"; 
 include_once "helpers/format.php"; 
?>

<?php 

class user
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
}
?>