<?php

function getAllGames(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM games';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

?>