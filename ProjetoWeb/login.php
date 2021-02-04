<?php

    include( 'config.php' );

    // Recebe por POST o parâmetro 'username'
    $username = $_POST['username'];

    if( userExists( $username ) )
        setcookie('user',$username);
    
    header("Location: ./index.php",TRUE,303);
    exit; 
    
?>