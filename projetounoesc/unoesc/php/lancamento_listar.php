<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 12/05/16
 * Time: 20:42
 */
  require('conexao.php');

   $sql = 'select  l.*, c.nome from lancamento l join categoria c on c.idcategoria = l.categoria';

   $qry = $conexao->prepare($sql);

   if($qry->execute()){

     $dados = $qry->fetchAll(PDO::FETCH_OBJ);

     echo json_encode(array("dados"=>$dados));

  }


?>