<?php

  require('conexao.php');
    
    $c = $_GET['categoria'];


    $sql = 'delete from categoria where idcategoria = :id';
     
    $qry = $conexao->prepare($sql);

    $qry->bindParam(':id',$c,PDO::PARAM_STR);

    $qry->execute();
?>
