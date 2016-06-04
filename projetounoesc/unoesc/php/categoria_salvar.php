<?php
	require 'conexao.php';

	$dadosformulario = json_decode(file_get_contents("php://input"));

	$nome = $dadosformulario->nome;

    $sql = 'insert into categoria (nome) values (:nome)'; 

	$qry = $conexao->prepare($sql);

    $qry->bindParam(':nome', $nome, PDO::PARAM_STR);

	$qry->execute();
?>