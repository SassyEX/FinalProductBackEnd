<?php
session_start();
class Users {
	protected $Id;
	protected $User;
	protected $Pass;
	protected $Level;
	protected $Image;
	public $regresar;

	public function Read() {
		try {
			$database = "practicabd";
			$table = "users";
			include ("../models/connect.php");
			$obj_cnx = new connection($database);

			$sql = "SELECT * FROM " . $table . " WHERE user = ? AND pass = ?";
			$result = $obj_cnx->cn->prepare($sql);
			$result->execute([$this->User, md5($this->Pass)]);

			if ($result->rowCount() > 0) {
				session_start();
				if (!isset($_SESSION['u']))
					$_SESSION['u'] = $this->User;
				return 1;
			} else {
				return 0;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		} finally {
			$obj_cnx->CloseConnection();
		}
	}
}
?>
