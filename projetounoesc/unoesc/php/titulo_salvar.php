<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 19/05/16
 * Time: 19:57
 */

require 'conexao.php';

   $dadosformulario = json_decode(file_get_contents("php://input"));

    $idcategoria = $dadosformulario->idcategoria;
    $descricao = $dadosformulario->descricao;
    $vencimento = $dadosformulario->vencimento;
    $valor = $dadosformulario->valor;


   $vencimento = date("Y-m-d",strtotime(str_replace('/','-',$vencimento)));

    $sql = "insert into titulo (idcategoria, descricao, vencimento, valor) values (:idcategoria, :descricao, :vencimento, :valor)";

    $qry = $conexao->prepare($sql);
    $qry->bindParam(':idcategoria', $idcategoria, PDO::PARAM_STR);
    $qry->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $qry->bindParam(':vencimento', $vencimento, PDO::PARAM_STR);
    $qry->bindParam(':valor', $valor, PDO::PARAM_STR);

  $qry->execute();



?>