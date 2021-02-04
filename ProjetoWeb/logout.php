<?php

    // Elimina o Cookie
    setcookie('user',"", time() - 3600);

    header("Location: ./index.php",TRUE,303);
    exit;
?>