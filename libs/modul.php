<?php 

 function getCount($table){
     global $conn;

     try {
         $sql ="SELECT Count(*) AS jumlah FROM $table";

         $cmd = $conn-> prepare($sql);
         $cmd->execute();
         $row = $cmd->fetch();
        
        
         return $row ["jumlah"];
     }catch(PDOExeption $err){
         return "null";
     }
}