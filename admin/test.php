<?php 

    $m='';
    $l='';

    require_once "../utils.php";
    
        
    $d = date('Y-m-d');
    $at = 'Aman Shakya';
    $sql = $conn->query("UPDATE authors SET posts = posts+0, updated = '".$d."' WHERE name = '".$at."'");

    $stmt=$conn->query("SELECT * FROM authors WHERE name='".$at."'");
    $aut=$stmt->fetch(PDO::FETCH_ASSOC);
    echo $aut['name'],$aut['updated'];
    
?>