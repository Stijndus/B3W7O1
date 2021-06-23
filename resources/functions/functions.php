<?php

function getAllGames(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM games';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

function getGame($id){
    $pdo = dbCon();
    $sql = 'SELECT * FROM games WHERE id=:id';
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    $result = $result->fetch();
    return $result;
}

function appointment($gameName,$datum,$instructor,$players, $gameId){
    echo $gameName;
    echo $datum;
    echo $instructor;
    echo $players;
    $pdo = dbCon();
    $sql = "INSERT INTO agenda (`gameName`, `date`, `instructor`, `players`, `gameId`) VALUES (:gameName, :date, :instructor, :players, :gameId)";
    echo $sql;
    $result = $pdo->prepare($sql);
    $result->execute(array(
        ':gameName' => $gameName,
        ':date' => date('Y-m-d H:i:s', strtotime($datum)),
        ':instructor' => $instructor,
        ':players' => $players,
        ':gameId' => $gameId,
    )
    );
}

function getAllAppointments(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM agenda';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

function getAppointment($id){
    $pdo = dbCon();
    $sql = 'SELECT * FROM agenda WHERE `id`=:id';
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    $result = $result->fetch();
    return $result;
}

function deleteAppointment($id){
    $pdo = dbCon();
    $sql = 'DELETE FROM `agenda` WHERE `id`=:id';
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}