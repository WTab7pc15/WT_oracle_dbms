
<?php
class DBController
{
	private $user = "pradyot";
	private $password = "CMPN";
	private $database = "localhost/orcl.mshome.net";
	private $conn;

	function __construct()
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
		$this->conn = $this->connectDB();
	}

	function connectDB()
	{
		$conn = oci_connect($this->user, $this->password, $this->database);
		if (!$conn) {
			$m = oci_error();
			trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
		}
		return $conn;
	}

	function runQuery($query)
	{
		$s = oci_parse($this->conn, $query);
		if (!$s) {
			$m = oci_error($this->conn);
			trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
		}
 		$r = oci_execute($s);
		if (!$r) {
			$m = oci_error($s);
			trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
		} 

		while (($row = oci_fetch_assoc($s)) != false) {
			$resultset[] = $row;
		}
		if (!empty($resultset))
			return $resultset;
	}

	function numRows($query)
	{
		$s = oci_parse($this->conn, $query);
		$rowcount = oci_num_rows($s);
		return $rowcount;
	}
}
?>