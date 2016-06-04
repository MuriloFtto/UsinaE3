<?php

  require('conexao.php');
  
    $sql = 'select  c.* from categoria c order by c.nome';
     
    $qry = $conexao->prepare($sql);

    if($qry->execute()){
      
       $dados = $qry->fetchAll(PDO::FETCH_OBJ);
    
       echo json_encode(array("dados"=>$dados));

    }
?>