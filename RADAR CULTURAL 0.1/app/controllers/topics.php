<?php

include("../../app/database/db.php");

$table = 'tb_categoria';

$id = '';
$nome = '';

$topics = selectAll($table);


if (isset($_POST['add-topic'])) {
	unset($_POST['add-topic']);
	$topic_id = create('tb_categoria', $_POST);
	$_SESSION['message'] = 'Categoria criada com sucesso';
	$_SESSION['type'] = 'success';
	header('location: index.php');
	exit();
}

if (isset($_GET['id_categoria'])) {
	$id = $_GET['id_categoria'];
	$topic = selectOne($table, ['id_categoria' => $id]);
	$id = $topic['id_categoria'];
	$nome = $topic['nome'];

}

if (isset($_POST['update-topic'])) {
	$id = $_POST['id_categoria'];
	unset($_POST['update-topic'], $_POST['id_categoria']);
	$topic_id = updateTopic($table, $id, $_POST);

	$_SESSION['message'] = 'Categoria atualizada com sucesso';
	$_SESSION['type'] = 'success';
	header('location: index.php');
	exit();
}