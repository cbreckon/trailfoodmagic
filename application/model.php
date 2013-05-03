<?php

class Model {
	public function user_info() {
		$mysqli = new mysqli("calebbreckoncom.ipagemysql.com", "cbreckon", "@Cab0126", "cmsc495"); 
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		echo 'Connected successfully';
		
		//$stmt = $mysqli->prepare("SELECT ID, last FROM test_table");
		//$stmt->execute();
		//$res = $stmt->get_result();
		
		
		if (!($stmt = $mysqli->prepare("SELECT ID, last FROM test_table ORDER BY ID ASC"))) {
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		
		$stmt->execute();
		$stmt->bind_result($col1, $col2);
		while ($stmt->fetch()) {
			printf("%s %s\n", $col1, $col2);
		}
		$stmt->close();
		
		$mysqli->close();
		
		//return array(
		//	'first' => 'Caleb',
		//	'last'  => 'Breckon'
		//);
	}
}