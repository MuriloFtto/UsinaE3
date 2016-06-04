<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 12/05/16
 * Time: 21:14
 */
  require('conexao.php');

    $l = $_GET['lancamento'];


    $sql = 'delete from lancamento where idlancamento = :id';

    $qry = $conexao->prepare($sql);

    $qry->bindParam(':id',$l,PDO::PARAM_STR);

    $qry->execute();

?>