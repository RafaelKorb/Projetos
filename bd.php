<!DOCTYPE html><html><body>
<?php

$server = "localhost";
$user = "Rafael";
$pass = "admin";
$db = "meuDB";



$CRM = $_POST["CRM"];
$senha = $_POST["senha"];
$nome_medico = $_POST["nome_medico"];
$email = $_POST["email"];
$esp = $_POST["especialidade"];
$planodesaude = $_POST["plano_de_saude"];
$horario = $_POST["horario"];


 
 class Conexao {
 
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=$server', $db, $user, $pass,
 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
 
        return self::$instance;
    }
 
}
 


/*
try{
	$conn = new PDO("mysql:host=$server", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//EXECUTA UM COMANDO SQL
	$sql = "CREATE DATABASE $db";
	$conn->exec($sql);
	echo "Banco de Dados $db foi criado!";
	}

catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}

$conn = null;



/*
try{
	$conn = new PDO("mysql:host=$server", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql = "CREATE TABLE medicos(
				CRM INT UNSIGNED NOT NULL,
				nome VARCHAR(30) NOT NULL,
				email VARCHAR(30) NOT NULL,
				especialidade VARCHAR(50), 
				planodesaude VARCHAR(40),
				senha VARCHAR(30),
				PRIMARY KEY (CRM));";
	$conn->exec($sql);
	echo"Tabela programadores foi criada!";
	}
	
catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}

$conn = null;

try{
	$conn = new PDO("mysql:host=$server", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "INSERT INTO medicos(CRM, nome, email, especialidade, planodesaude, senha) VALUES
	($CRM, "$nome", "$email", "$especialidade", "$planodesaude", "$senha");";
	
	$conn->exec($sql);
	echo"Tabela programadores foi criada!";
	}
	
catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}

$conn = null;

*/

/*
$CRM = $_POST["CRM"];
$senha = $_POST["senha"];
$nome_medico = $_POST["nome_medico"];
$email = $_POST["email"];
$esp = $_POST["especialidade"];
$planodesaude = $_POST["plano_de_saude"];
$horario = $_POST["horario"];
*/

?>
</body></html>