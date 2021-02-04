<?php
    $con = mysqli_connect("localhost","id16003989_root","Auto%Dudu2021","id16003989_autoduarte");
    if(mysqli_connect_errno()){
        echo "Failed to connect : " . mysqli_connect_error(); 
    }

    $select = "select * from users";
    $connect = mysqli_query($con, $select);

    while($search = mysqli_fetch_array($connect)){
        $id = $search['id_user'];
        $username = $search['username'];

        $locationbar = "$username";
    }    
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos / AutoDuarte</title>
    <link rel="stylesheet" href="css2/style2.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="mainContainer">
        <div class="mainLeft">
            <div class="marcas">
                <p>Marcas</p>
                <a href="vw.php">Volkswagen</a>
                <a href="ford.php">Ford</a>
                <a href="mercedes.php">Mercedes</a>
            </div>
        </div>

        <div class="mainRight">
            <p class="location-bar"><?php echo "$locationbar - Carros Favoritos"; ?></p>
            <div class="rightItems">
                <div class="colunasCarro">
                    <?php
                        $idlink = $_GET['userid'];
                        $select = "select * from carros_favoritos where id_user = '$idlink'";
                        $connect = mysqli_query($con, $select);

                        while($search = mysqli_fetch_array($connect)){
                            $idFavorito = $search['id_carro'];
                            
                            $select = "select * from carros where id_carro = '$idFavorito' order by id_carroFavorito ASC";
                            $connect = mysqli_query($con, $select);
                            
                            while($search = mysqli_fetch_array($connect)){
                                $id = $search['id_carro'];
                                $marca = $search['marca']; 
                                $modelo = $search['modelo'];
                                $foto = $search['fotocarro'];
                                $likes = $search['likes'];
    
                                echo "
                                    <div class='index-car'>
                                        <div class='container-car'>
                                            <a href='carro.php?idcarro=$id'>
                                                <div class='carro-box'>
                                                    <div id='imagem'>
                                                        <img src='img/carros/$foto'>
                                                    </div>
                                                    <div class='car-box-bottom'>
                                                        <div id='marca'>
                                                            $marca $modelo
                                                        </div>
                                                        <div id='likes'>
                                                            <img src='img/likes.png'> $likes
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                ";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>