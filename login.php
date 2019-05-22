<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>
<?php

session_start();
     


$user = $_POST["login"];
$pass = $_POST["senha"];

$_SESSION["login"] = $user; //gravo uma sessao com o nome do usuario
 

$xml = simplexml_load_file('cadastro.xml');
$sml = simplexml_load_file('bd_paciente.xml');
 



foreach ($xml->medico as $medico) {
	if(($user == $medico->nome_medico) && ($pass == $medico->senha)){
	setcookie("logado", "1");
	echo '<meta http-equiv="refresh" content="0;url=Medico.html">';
	
	}
}

foreach ($sml->paciente as $paciente) {
	if(($user == $paciente->nome_paciente) && ($pass == $paciente->senha)){
	setcookie("logado", "1");
	echo '<meta http-equiv="refresh" content="0;url=html/Paciente.html">';
	
	}
}

foreach ($xml->atendente as $atendente) {
	if(($user == $atendente->nome_atendente) && ($pass == $atendente->senha)){
	setcookie("logado", "1");
	echo '<meta http-equiv="refresh" content="0;url=html/Atendente.html">';
	
	}
}

echo "<font face=verdana size=2>";
echo "Usuário ou senha incorretos!";
echo "<br>";
echo "</font>";








				

				#REPETICAO ABAIXO SERIA USADA NA COMPARACAO, POREM OCORREU ALGUM ERRO LOGICO/SINTAXE.
									
/*
 foreach ($xml->medico as $medico; $xml->paciente as $paciente) {
		if(($user == $medico->nome_medico) && ($pass == $medico->senha)){
		#setcookie("logado", "1");
			echo "ESTA LOGADO";
		}
		else if(($user == $paciente->nome_paciente) && $pass == $paciente->nome_paciente)){
		#setcookie("logado", "1");
			echo "ESTA LOGADO";
		}		
 


 
	
*/			

?>



   
  
