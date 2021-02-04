<?php
	include( 'config.php' );

	if( isset( $_COOKIE['user'] ) )
	{
		$username = $_COOKIE['user'];
    }
    
    $con = mysqli_connect("localhost","id16003989_root","Auto%Dudu2021","id16003989_autoduarte");
    if(mysqli_connect_errno()){
        echo "Failed to connect : " . mysqli_connect_error(); 
    }

    $select = "select * from users";
    $connect = mysqli_query($con, $select);

    while($search = mysqli_fetch_array($connect)){
        $id = $search['id_user'];
    }    
        
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <!-- Header -->
    <div id="shadow">
    <div id="header">
                <div id="headerLeft">
                    <a href="index.php"><img src="img/logo2.png" alt=""></a>
                </div>
                
                <div id="search">
                    <?php
                    echo '
                    <form method="POST" action="prod_search.php">
                        <input type="text" name="pesquisa" placeholder="Pesquisar...">
                        <input name="pesquisar_text" class="button button-2" type="submit">
                    </form>				
		
				<br><br>
				</form>
                    ';
?>
                </div>
                

                <div id="headerRight">
                    <div class="topRight"></div>
                    <div class="topRight"></div>
                    <div class="topRight">
                    <?php 
			if( !empty($username) ):		
				echo <<<USER
					<div id="logout">
                        <a href="user_perfil.php?userid=$id">$username</a>
						<a href="logout.php">logout</a>
					</div>	
USER;
			else:
		?>		
				<form id="login" action="login.php" method="post">
					<input type="text" name="username" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                    <a href="register.php">Registar</a>
					<input type="submit" value="Login">
				</form>
		<?php endif; ?>	
                    </div>
                </div>
            </div>

            <nav>
                <a href="desportivo.php">Desportivo</a>
                <a href="suv.php">SUV</a>
                <a href="colecao.php">Coleção</a>
            </nav>
    </div>
    
    <!-- /Navbar -->
    <script src="scripts/script.js"></script>
</html>