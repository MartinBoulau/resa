<?php
    $database = 'ws_demo';
    $user = 'root';
    $passwd = '2020+Lannion';
    $host = 'mysql';
    $dsn="mysql:dbname=".$database.";host=".$host ;
    try{
        $connexion= new PDO($dsn,$user,$passwd);
    }
    catch(PDOException $e){
        printf("Échec de la connexion : %s\n", $e->getMessage());
        exit();
    }
?>