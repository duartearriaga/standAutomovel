<?php
    include '../includes/dbh.inc.php';

    // GET ID USER
    $username = $_COOKIE['user'];

    $sql = "select * from users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $iduser =  $row['id_user'];
        }
    }

    // GET ID CARRO
    $idlink = $_GET['idcarro'];

    // INSERT INTO DATABASE
    $sql = "insert into carros_favoritos (id_user, id_carro) values ($iduser, $idlink)";
    $result = mysqli_query($conn, $sql);

    // ALTER TABLE CARRO -> LIKES
    $sql = "select * from carros where id_carro = '$idlink'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $idcarro =  $row['likes'];
            $idcarro++;

            $sql = "update carros set likes = '$idcarro' where id_carro = '$idlink'";
            mysqli_query($conn, $sql);
        }
    }

    // PAGE RESULT
    header("Location: ../carro.php?idcarro=$idlink");
?>