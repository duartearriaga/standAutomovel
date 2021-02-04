<?php 
	
  function estabelerConexao()
{
     // Deviam estar num ficheiro de configuração
     $databasename = "id16003989_autoduarte";
     $hostname = "localhost";
     $username = "id16003989_root";
     $password = "Auto%Dudu2021";
    
    try {
        $conexao = new PDO("mysql:host=$hostname;dbname=$databasename;charset=utf8mb4",$username, $password);
    }
    catch (\PDOException $e) {
        echo $e->getMessage();
    }

    return $conexao;
}

function userExists( $username )
{
    $conexao = estabelerConexao();
    $stmt = $conexao->prepare("SELECT username FROM users WHERE username=:username" );
    $stmt->execute( [ 'username' => $username ] );
    $username = $stmt->fetchColumn();

    // True se for String , $username pode ser false ou ter o nome do user 
    return is_string($username);

}

function insertUser( $username, $pass)
{
    $conexao = estabelerConexao();

    $sql = "INSERT into users(username, password) values (:username, :password)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindparam(":username", $username, PDO::PARAM_STR);
    $stmt->bindparam(":password", $pass, PDO::PARAM_STR);
    $stmt->execute();
    
}

?>