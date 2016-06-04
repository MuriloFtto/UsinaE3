<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 19/05/16
 * Time: 20:46
 */

require('conexao.php');

  $t = $_GET['titulo'];

    $sql = "select  *  from titulo where idtitulo = ".$t;

    $qry = $conexao->prepare($sql);

if ($qry->execute()){

    $dados = array_shift($qry->fetchAll());

    $sql = "insert into lancamento (categoria, descricao, tipo, valor) values (:idcategoria, :descricao, :tipo, :valor)";

    $tipo = 1;
    $qry = $conexao->prepare($sql);
    $qry->bindParam(':idcategoria', $dados[1], PDO::PARAM_STR);
    $qry->bindParam(':descricao', $dados[2], PDO::PARAM_STR);
    $qry->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $qry->bindParam(':valor', $dados[4], PDO::PARAM_STR);

   if($qry->execute()){
       echo json_encode(array("dados"=>true));
   }else
       echo json_encode(array("dados"=>false));

}
?>

