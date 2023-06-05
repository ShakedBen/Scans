<?php

// include "Bcrypt.php";
// $bcrypt=new Bcrypt(15);

class database
{
	public $connection;
	public $query;

	//constructor
	public function __construct($server = 'localhost', $user = 'root', $password = '', $dbName = '')
	{
		$this->connection = new mysqli($server, $user, $password, $dbName);
		if ($this->connection->connect_error) {
			$this->error('Failed to connect to MySQL -' . $this->connection->connect_error);
		}
	}
	//insert data dynamic return query
	public function insertData($table, $data)
	{
		$key = array_keys($data);
		$val = array_values($data);
		$sql = "INSERT INTO $table (" . implode(',', $key) . ") VALUES (" ."'". implode("','", $val) . "')";
		$this->query = ($sql);
	}





	//select data dynamic return query
	public function selectData($table, $data, $where)
	{
		$data = $this->dataFor($data);
		$key = array_keys($data);
		$sql = "SELECT " . implode(', ', $key) . " "
		. "FROM (" . implode(",", $table) . ") WHERE $where";
		$this->query = $sql;

	}


	//delete table dynamic return query
	public function deleteData($table,  $where)
	{
		$sql = "DELETE FROM $table WHERE $where";
		$this->query = $sql;
	}
	//update data dynamic return query
	function updateData($table, $data, $where)
	{
		$cols = array();
		foreach ($data as $key => $val) {
			$cols[] = "$key = '$val'";
		}
		$sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
		$this->query = $sql;
	}

	public function error($error)
	{
		if ($this->show_errors) {
			exit($error);
		}
	}
	public function dataFor($data)
	{
		$arr = array();
		foreach ($data as $d) {
			$arr[$d] = $d;
		}
		return $arr;
	}
}








if(isset($_POST["onSubmitLoginButton"]))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
	checkConn($email,$password);

    

}
                       // check if username and password is equal
function checkConn($email,$password)
{

	if(empty($email)||empty($password))
    {
        echo "please complet all data";
    }
    else {
	$db = new database('localhost', 'root', '', 'ugi');
	$sql="SELECT * FROM users WHERE email='$email'";
	$selectfdb=mysqli_query($db->connection, $sql);
    $row=mysqli_fetch_array($selectfdb);

	// $bcrypt=new Bcrypt(15);
	// $ver=$bcrypt->verify($password,$row['password']);

		// print_r($password);
		// print_r($row["password"]);


	if($row!=null){
    if($row["email"]==$email && $password==$row['password'])
    {
        // setcookie('uid',$row["u_id"],time()+(3600*24));
        // setcookie('login',1,time()+(3600*24));
		print_r( "hello world");
        echo "<meta http-equiv='refresh' content='0; url=register.php'>";
        echo "hello world";
    }
    else{
        echo "Email or password incorrect";
    }
    }
	else{
		echo "cannot find this user";
	}
}
}




		//check data when register
	 function selectDataToCheck($table, $email)
	{
        $db = new database('localhost', 'root', '', 'ugi');
		$sql = "SELECT * FROM $table WHERE email='$email'";
        $selectfdb=mysqli_query($db->connection, $sql);
        $row=mysqli_fetch_array($selectfdb);
        if($row!=null &&$row["email"]==$email)
        {
      echo "<h1><strong>The email is busy try one another</strong></h1>";
      return false;
        }
        return true;
	}

function addUser($table, $user)
{
	$db = new database('localhost', 'root', '', 'ugi');
			$db->insertData($table, $user);
			mysqli_query($db->connection, $db->query);
         
		
	}

function checkAllData($name,$lastName,$email,$password,$cpassword)
{
    if(empty($cpassword)||empty($password))
         {
             echo "Invalid password";
         }
     
     else if($password!=$cpassword)
     {
         echo "Password confirmation is invalid";
     }
    //   else if (strlen($password) < 8) 
    //       {
    //    echo  "Password too short!";
    // }

    // else if (!preg_match("#[0-9]+#", $password)) 
    //         {
    //      echo "Password must include at least one number!";
    // }

    // else if (!preg_match("#[a-zA-Z]+#", $password)) 
    //         {
    //      echo  "Password must include at least one letter!";
    // }     
     else if(strlen($name)==0)
     {
        echo "invalid name";
     }
        else if(strlen($lastName)==0)
     {
        echo "invalid last name";
     }
     else if(!preg_match("/^[a-zA-Z]/i", $name))
     {
         echo "<strong>invalid  name.</strong>";
         
         
     }
      else if(!preg_match("/^[a-zA-Z]/i", $lastName))
     {
           echo "invalid last name";
         
     }
   else if(empty($name)||empty($lastName)||empty($email)||empty($password))
    {
        echo "please.. complete all data";
    }
    else{
        return true;
     //echo "<meta http-equiv='refresh' content='0; registerSuccee.php'>";
    }
}

    if(isset($_POST["onSubmitRegisterButton"]))
{
    $name=$_POST["name"];
    $lastName=$_POST["lastName"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    if(selectDataToCheck('users',$email)&&checkAllData($name,$lastName,$email,$password,$cpassword)){
		//$hash=$bcrypt->hash($password);
        $user=array(
            'name'=> $name,
            'lastName'=> $lastName,
            'email'=>$email,
            'password'=>  $password
        );
        addUser('users',$user);
    }


 }






?>