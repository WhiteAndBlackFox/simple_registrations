<?php
switch ($_POST['func']) {
	case 'new_users':
		new_user();
		break;
	case 'auth_users':
		auth_user();
		break;
	case 'chenge_users':
		chenge_users();
		break;
	default:
		break;
}

function chenge_users(){
	$json = array('error' => "", "status" => false);
	var_dump($_POST);
	try{
		$input = fopen('../reg_users.csv', 'r');
		$output = fopen('../reg_users_temp.csv', 'w');
		while( false !== ( $data = fgetcsv($input) ) ){
			print_r($data);
		   if ($data[0] == $_POST['username'] and $data[1] == $_POST['userlastname'] and $data[5] == $_POST['telephone']) {
		   		$data[2] = $_POST['databirthday'];
		   		$data[3] = $_POST['company'];
		   		$data[4] = $_POST['position'];
		   		$data[6] = $_POST['password'];
		   }
		   fputcsv($output, $data);
		}
		fclose($input);
		fclose($output);

		unlink('../reg_users.csv');
		rename('../reg_users_temp.csv', '../reg_users.csv');

		$json["status"] = true;
		$json["error"] = "";
	} catch (Exception $e){
		$json["error"] = "Такой номер уже зарегестрирован!";
	}
	echo json_encode($json);
}

function auth_user(){
	$filename = '../reg_users.csv';
	$row = check_user($filename, $_POST['username'], $_POST['password'], false);
	if(is_null($row)){
		$row = array('status'=>false);
	} 
	echo json_encode($row);
}

function check_user($filename, $user, $pass, $reg){
	if(file_exists($filename)){
		$file_users = fopen($filename, "r");	
		while($row = fgetcsv($file_users)){
			if ($reg){
				if ($row[5] == $user){
					return $row;
				}
			} else {
				if ($row[5] == $user and $row[6] == $pass){
					return array('username' => $row[0], 'userlastname' => $row[1], 'databirthday' => $row[2], 'company' => $row[3], 'position' => $row[4], 'telephone' => $row[5], 'password' => $row[6], 'access' => $row[7], 'status'=>true); 
				}	
			}
		}
	}
	return;
}

function new_user(){
	$json = array('error' => "", "status" => false);
	try {
		$filename = '../reg_users.csv';
		$nu = array($_POST['username'], $_POST['userlastname'], $_POST['databirthday'], $_POST['company'], $_POST['position'], $_POST['telephone'], $_POST['password'], 0);
		
		$res = check_user($filename, $_POST['telephone'], $_POST['password'], true);
		if(is_null($res)){
			$ru = fopen($filename, 'a');

			fputcsv($ru, $nu);
			fclose($ru);

			$json["status"] = true;
			$json["error"] = "";
		} else {
			$json["error"] = "Такой номер уже зарегестрирован!";
		}
		
	} catch (Exception $e) {
		$json["error"] = $e;
	}
	echo json_encode($json);
}

?>