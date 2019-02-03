<?php
switch ($_POST['func']) {
	case 'new_users':
		new_user();
		break;
	default:
		break;
}


function new_user(){
	try {
		$filename = '../reg_users.csv';
		$nu = array($_POST['username'], $_POST['userlastname'], $_POST['databirthday'], $_POST['company'], $_POST['position'], $_POST['telephone'], 0);
		$ru = fopen($filename, 'a');
		fputcsv($ru, $nu);
		fclose($ru);	

	} catch (Exception $e) {
		echo $e;
	}
	
}
?>