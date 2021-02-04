<?php
    $con = mysqli_connect("localhost","id16003989_root","Auto%Dudu2021","id16003989_autoduarte");
    if(mysqli_connect_errno()){
        echo "Failed to connect : " . mysqli_connect_error(); 
    }

    $idlink = $_GET['idcarro'];

    $select = "select * from carros where id_carro = '$idlink'";
    $connect = mysqli_query($con, $select);

    while($search = mysqli_fetch_array($connect)){
        $id = $search['id_carro'];
        $marca = $search['marca']; 
        $modelo = $search['modelo'];

        $locationbar = "$marca $modelo";
    }


	if( isset( $_COOKIE['user'] ) )
	{
		$username = $_COOKIE['user'];
    }

    $sql = "select * from users where username = '$username'";
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $iduser =  $row['id_user'];
        }
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$locationbar - AutoDuarte"; ?></title>
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
            <p class="location-bar"><?php echo "$locationbar - Detalhes"; ?></p>
            <div class="rightItems">
                <div class="colunasCarro">
                    <?php
                        $idlink = $_GET['idcarro'];
                        $select = "select * from carros where id_carro = '$idlink'";
                        $connect = mysqli_query($con, $select);

                        while($search = mysqli_fetch_array($connect)){
                            $id = $search['id_carro'];
                            $marca = $search['marca']; 
                            $modelo = $search['modelo'];
                            $preco = $search['preco'];
                            $combustivel = $search['combustivel'];
                            $ano_mes = $search['ano_mes'];
                            $cilindrada = $search['cilindrada'];
                            $potencia = $search['potencia'];
                            $portas = $search['n_portas'];
                            $lotacao = $search['lotacao'];
                            $classe = $search['classeVeiculo'];
                            $foto = $search['fotocarro'];
                            $likes = $search['likes'];

                            echo "
                                <div class='detailsCarro'>
                                    <div class='containerCarro'>
                                        <div class='fotoCarro'>
                                            <img src='img/carros/$foto'>
                                        </div>
                                        <div class='infoCarro'>
                                                Marca: $marca<br>
                                                Modelo: $modelo<br>
                                                Preço: $preco €<br>
                                                Tipo de combustível: $combustivel<br>
                                                Data: $ano_mes<br>
                                                Cilindrada: $cilindrada cm3<br>
                                                Potência: $potencia cv<br>
                                                Número de portas: $portas<br>
                                                Lotação: $lotacao<br>
                                                Classe: $classe<br>
                                                Nº de likes: $likes";

                                                if(isset( $_COOKIE['user'])) {
                                                    $sql = "select * from carros_favoritos where id_user = '$iduser' and id_carro = '$idlink'";
                                                    $result = mysqli_query($con, $sql);
                                                    $resultCheck = mysqli_num_rows($result);
                                                
                                                    if ($resultCheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "
                                                                <a href='functions/like_remover.php?idcarro=$idlink'>
                                                                    <div id='adicionarFavorito'>
                                                                        <img src='img/likes.png'> Remover dos favoritos
                                                                    </div>
                                                                </a>
                                                            ";
                                                        }
                                                    } else {
                                                        echo "
                                                            <a href='functions/like_adicionar.php?idcarro=$idlink'>
                                                                <div id='adicionarFavorito'>
                                                                    <img src='img/likes.png'> Adicionar aos favoritos
                                                                </div>
                                                            </a>
                                                        ";
                                                    }



                                                                    
                                                } 
                                            echo "
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>