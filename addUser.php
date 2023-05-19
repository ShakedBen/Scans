
<?php
include 'database.php';


function addUser($table, $data)
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

			$db->insertData($table, $dataToInsert);
			mysqli_query($db->connection, $db->query);
		}
	}
