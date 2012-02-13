<?php
function close_db($db_conn = NULL){
	$con =(!$db_conn)? $_SESSION["sql_conn"]:$db_conn;
	mysql_close($con);
	session_unregister("sql_conn");
}

function connect_database(){
	include('config.php');
	$sql_conn = mysql_connect($db_server, $db_login, $db_password) or clean_and_die('Blad polaczenia: '.mysql_error().'<br/>');
	mysql_set_charset('utf8',$sql_conn);
	mysql_select_db($db_name) or clean_and_die('Blad wyboru bazy MySQL: '.mysql_error().'<br/>');
	return $sql_conn;
}

function  clean_and_die($message){
	close_db();
	$_SESSION["message"] = $message;
	die($message);
}

function insert_db($table, $fields_array, $conn ){
	$columns = "";
	$values = "";
	foreach ($fields_array as $key => $value) {
		if($columns!=""){
			$columns.=",";
			$values.=",";
		}
		$columns .=" $key ";
		$values .=" $value ";
	}
	$sql = "insert into $table( $columns ) values ($values)";
	error_log("insert_db(): $sql\n", 3 , 'log.txt');
	$query_status = mysql_query($sql, $conn);
	if($query_status){
		return array('status'=> $query_status, 'insert_id'=>mysql_insert_id($conn));
	}else{
		return array('status'=> FALSE, 'insert_id'=>FALSE);
	}
}
function update_db($table, $fields_array, $condition, $conn ){
	$columns = "";
	$values = "";
	foreach ($fields_array as $key => $value) {
		if($columns!=""){
			$columns.=",";
		}
		$columns .=" $key = $value ";
	}
	$sql = "update $table set $columns";


	if($condition!=NULL){
	 $sql .= " where $condition";
	}
	error_log("update_db(): $sql\n", 3 , 'log.txt');

	mysql_query($sql, $conn);
	return mysql_affected_rows($conn);
}
function load_db_one($table, $fields, $condition, $connection){
	$sql = "select $fields from $table where $condition";
//	error_log("load_db_one(): $sql\n", 3 , 'log.txt');
	$result = mysql_query($sql, $connection);
	$row = mysql_fetch_array($result);
	mysql_free_result($result);
	return $row;
}
function load_db_columns($table, $fields, $aliases, $condition, $connection){
	$sql = "select $fields from $table where $condition";
	$columns = array();
	$result = mysql_query($sql, $connection);
	while($row = mysql_fetch_array($result)){
		foreach ($aliases as $column){
			$columns[$column][] = $row[$column];
		}
	}
	mysql_free_result($result);
	return $columns;
}

function load_db_rows($table, $fields, $connection, $condition = "1", $order="1"){
	$sql = "select $fields from $table where $condition ORDER BY $order";
//	error_log("load_db_rows(): $sql\n", 3 , 'log.txt');
	$rows = array();
	$result = mysql_query($sql, $connection);
	while ($row = mysql_fetch_assoc($result)){
		$rows[] = $row;
	}
	mysql_free_result($result);
	return $rows;
}


function delete_db_rows($table, $condition, $connection){
	$sql = "delete from $table where $condition";
	error_log("delete_db_rows(): $sql\n", 3 , 'log.txt');
	mysql_query($sql, $connection);
	return mysql_affected_rows($connection);
}


?>
