<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 12/05/16
 * Time: 21:24
 */
require 'conexao.php';

  $dadosformulario = json_decode(file_get_contents("php://input"));

  $idcategoria = $dadosformulario->idcategoria;
  $descricao = $dadosformulario->descricao;
  $tipo = $dadosformulario->tipo;
  $valor = $dadosformulario->valor;

  $sql = "insert into lancamento (categoria, descricao, tipo, valor) values (:idcategoria, :descricao, :tipo, :valor)";

  $qry = $conexao->prepare($sql);
  $qry->bindParam(':idcategoria', $idcategoria, PDO::PARAM_STR);
  $qry->bindParam(':descricao', $descricao, PDO::PARAM_STR);
  $qry->bindParam(':tipo', $tipo, PDO::PARAM_STR);
  $qry->bindParam(':valor', $valor, PDO::PARAM_STR);

  $qry->execute();
?>