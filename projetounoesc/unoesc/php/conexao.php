<?php

   try{
	 $conexao = new PDO("mysql:host=localhost;dbname=unoesc;charset=utf8" , "root" , "root" , array());

    }
    catch (Exception $e){
        echo ($e->getMessage());    
    }

?>
