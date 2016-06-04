<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 19/05/16
 * Time: 19:55
 */

require('conexao.php');

   $t = $_GET['titulo'];

   $sql = 'delete from titulo where idtitulo = :id';

   $qry = $conexao->prepare($sql);

  $qry->bindParam(':id',$t,PDO::PARAM_STR);

  $qry->execute();

?>
