<?php
    $database = 'resa_vehicule';
    $user = 'batm';
    $passwd = 'batm-res4!';
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