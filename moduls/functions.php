<?php
session_start();
?>
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
	case 'clear_sessions':
		clear_sessions();
		break;
	case 'table_users':
		if($_SESSION['admin']){
			table_users();
		}
		break;
	case 'delete_users':
		if($_SESSION['admin']){
			delete_users();
		}
		break;
	default:
		break;
}

function delete_users(){
	$input = fopen('../reg_users.csv', 'r');
	$output = fopen('../reg_users_temp.csv', 'w');
	$r = 0;
	while( false !== ( $data = fgetcsv($input) ) ){
		print_r($data);
		if ($r != $_POST['row']) {
			fputcsv($output, $data);
		}
	   $r += 1;
	}
	fclose($input);
	fclose($output);

	unlink('../reg_users.csv');
	rename('../reg_users_temp.csv', '../reg_users.csv');
}

function table_users(){
	$table = "";
	$r = 0;
	$filename = '../reg_users.csv';
	if(file_exists($filename)){
		$file_users = fopen($filename, "r");	
		while($row = fgetcsv($file_users)){
			$table .= "<tr id='" . $r . "'>
				<td id='" . $r . "_n'>{$row[0]}</td>
				<td id='" . $r . "_f'>{$row[1]}</td>
				<td id='" . $r . "_db'>{$row[2]}</td>
				<td id='" . $r . "_c'>{$row[3]}</td>
				<td id='" . $r . "_p'>{$row[4]}</td>
				<td id='" . $r . "_t'>{$row[5]}</td>
				<td>
					<div id='" . $r . "_delete' class=\"button_table\">Удалить</div>
					<div id='" . $r . "_edit' class=\"button_table\">Изменить</div>
				</td>
				</tr>";
			$r += 1;
		}
	}
	echo $table;
}

function clear_sessions(){
	session_unset();
	session_destroy();
}

function chenge_users(){
	$json = array('error' => "", "status" => false);
	try{
		$input = fopen('../reg_users.csv', 'r');
		$output = fopen('../reg_users_temp.csv', 'w');
		var_dump($_POST);
		while( false !== ( $data = fgetcsv($input) ) ){
		   if ($data[0] == $_POST['username'] and $data[1] == $_POST['userlastname'] and $data[5] == $_POST['telephone']) {
		   		$data[2] = $_POST['databirthday'];
		   		$data[3] = $_POST['company'];
		   		$data[4] = $_POST['position'];
		   		$data[6] = $_POST['password'];
		   		if($_SESSION["change"]){
		   			$data[7] = $_POST['access'];
		   		}
		   }
		   fputcsv($output, $data);
		}
		fclose($input);
		fclose($output);

		unlink('../reg_users.csv');
		rename('../reg_users_temp.csv', '../reg_users.csv');

		$json["status"] = true;
		$json["error"] = "";
		unset($_SESSION["change"]);
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
	if($row['access'] == 1){
		$_SESSION["admin"] = true;
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