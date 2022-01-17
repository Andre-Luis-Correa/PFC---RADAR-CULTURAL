<?php

//Exibir todos os erros quando ocorrerem
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

require('connect.php');


function dd($value) //vai ser deletada, serve para teste
{
	echo "<pre>", print_r($value, true), "</pre>";
	die();
}


function executeQuery($sql, $data)
{
	global $conn;
	$stmt = $conn->prepare($sql);
	$values = array_values($data);
	$types = str_repeat('s', count($values));
	$stmt->bind_param($types, ...$values);
	$stmt->execute();
	return $stmt;
}


function selectAll($table, $conditions = [])
{
	global $conn;
	$sql = "SELECT * FROM $table";

	if (empty($conditions)) {
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
	} else{
		//retorna apenas os registros que satisfazem as condições

		$i = 0;
		foreach ($conditions as $key => $value) {

			if ($i === 0) {
				$sql = $sql . " WHERE $key=?";
			} else {
				$sql = $sql . " AND $key=?";
			}
			$i++;
		}

		$stmt = executeQuery($sql, $conditions);
		$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
	}
	
}


function selectOne($table, $conditions)
{
	global $conn;
	$sql = "SELECT * FROM $table";

		$i = 0;
		foreach ($conditions as $key => $value) {

			if ($i === 0) {
				$sql = $sql . " WHERE $key=?";
			} else {
				$sql = $sql . " AND $key=?";
			}
			$i++;
		}

		$sql = $sql . " LIMIT 1";
		$stmt = executeQuery($sql, $conditions);
		$records = $stmt->get_result()->fetch_assoc();
		return $records;
}


function create($table, $data)
{
	global $conn;
	$sql = "INSERT INTO $table SET ";

	$i = 0;
	foreach ($data as $key => $value) {

		if ($i === 0) {
			$sql = $sql . " $key=?";
		} else {
			$sql = $sql . ", $key=?";
		}
		$i++;
	}

	$stmt = executeQuery($sql, $data);
	$id = $stmt->insert_id;
	return $id;

}


function updateUser($table, $id, $data)
{
	global $conn;
	$sql = "UPDATE $table SET ";

	$i = 0;
	foreach ($data as $key => $value) {

		if ($i === 0) {
			$sql = $sql . " $key=?";
		} else {
			$sql = $sql . ", $key=?";
		}
		$i++;
	}

	$sql = $sql . " WHERE id_usuario=?";
	$data['id_usuario'] = $id;
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;

}


function updateTopic($table, $id, $data)
{
	global $conn;
	$sql = "UPDATE $table SET ";

	$i = 0;
	foreach ($data as $key => $value) {

		if ($i === 0) {
			$sql = $sql . " $key=?";
		} else {
			$sql = $sql . ", $key=?";
		}
		$i++;
	}

	$sql = $sql . " WHERE id_categoria=?";
	$data['id_categoria'] = $id;
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;

}

/*function update($table, $id, $data)
{
	global $conn;
	$sql = "UPDATE $table SET ";

	$i = 0;
	foreach ($data as $key => $value) {

		if ($i === 0) {
			$sql = $sql . " $key=?";
		} else {
			$sql = $sql . ", $key=?";
		}
		$i++;
	}

	if(isset($data['id_usuario'])){
		$sql = $sql . " WHERE id_usuario=?";
		$data['id_usuario'] = $id;

	} elseif (isset($data['id_categoria'])){
		$sql = $sql . " WHERE id_categoria=?";
		$data['id_categoria'] = $id;
		
	}
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;

}*/


function deleteUser($table, $id)
{
	global $conn;
	$sql = "DELETE FROM $table WHERE id_usuario=? ";

	$stmt = executeQuery($sql, ['id_usuario' => $id]);
	return $stmt->affected_rows;

}

function deleteTopic($table, $id)
{
	global $conn;
	$sql = "DELETE FROM $table WHERE id_categoria=? ";

	$stmt = executeQuery($sql, ['id_categoria' => $id]);
	return $stmt->affected_rows;

}


