<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input")); 

switch ($data->btnName) {
	case 'Select':
		
 
		if (isset($data->id)){ 
			$query="select * from users where id=" .$data->id;
			$rs=$dbhandle->query($query);
			$resdata = $rs->fetch_array();
		} 
		else {
			$query="select * from users";
			$rs=$dbhandle->query($query);

			while ($row = $rs->fetch_array()) {
			  $resdata[] = $row;
			}
	 	}
		print json_encode($resdata);
		break;

	case 'Insert':
		$id=$dbhandle->real_escape_string($data->id);
		$firstname=$dbhandle->real_escape_string($data->firstname);
		$lastname=$dbhandle->real_escape_string($data->lastname);

		$query="INSERT INTO users(firstname, lastname) VALUES('".$firstname."', '".$lastname."')";

		$dbhandle->query($query);
		break;

	case 'Delete':
		$id=$data->id;
		$query="DELETE FROM users WHERE id=".$id;
		$dbhandle->query($query);
		break;

	case 'Update':

	 // exit($data->btnName);
		$id=$data->id;
	    $firstname= $data->firstname;

	    $lastname=$data->lastname;

	   	$query="UPDATE users SET firstname = '".$firstname."', lastname ='" . $lastname. "' WHERE id=$id ";
	    
	   	$dbhandle->query($query);
		break;
	default:
		# code...
		break;
} ;
exit;