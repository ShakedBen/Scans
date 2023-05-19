
<?php
include 'database.php';


function addData($table, $data)
{
	$db = new database('localhost', 'root', '', 'database');

	
	if ($table == 'users') {
		foreach ($data as $user) {
			$dataToInsert = array(
				'name' => $user['name'],
				'lastName' => $user['lastName'],
				'email' => $user['email'],
				'password' => $password['password']
			);
			$db->insertData($table, $dataToInsert);
			mysqli_query($db->connection, $db->query);
		}
	} else if ($table == 'posts') {
		foreach ($data as $post) {
			$dataToInsert = array(
				'id' => $post['id'],
				'userid' => $post['userId'],
				'title' => $post['title'],
				'content' => $post['body'],
				'date' => date("y/m/d"),
				'active' => true
			);
			$db->insertData($table, $dataToInsert);
			mysqli_query($db->connection, $db->query);
		}
	}
}
