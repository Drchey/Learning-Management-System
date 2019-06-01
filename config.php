

<?php
$hostname = '127.0.0.1';
$admin_name = 'root';
$password = '';
$dbname = 'projectcai';

$mysqli = mysqli_connect($hostname,$admin_name,$password,$dbname);

if(!$mysqli || !mysqli_select_db($mysqli,$dbname)){

	header('Location :error.php?db_error');
	exit();
}
else{
	return $mysqli;
	var_dump($mysqli);}

	mysql_close($mysqli);

?>