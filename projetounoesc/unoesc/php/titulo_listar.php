<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 19/05/16
 * Time: 19:45
 */

  require('conexao.php');

  $sql = 'select  t.*, c.nome from titulo t , categoria c where t.idcategoria = c.idcategoria order by t.descricao';

  $qry = $conexao->prepare($sql);

  if($qry->execute()){

    $dados = $qry->fetchAll(PDO::FETCH_OBJ);

    echo json_encode(array("dados"=>$dados));

  }

?>