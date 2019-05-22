<?php

$xml=simplexml_load_file("bd_paciente.xml");

if(isset($_POST["button_paciente"])){
	foreach ($xml->paciente as $paciente) {
		if($_POST["nome_paciente"] == $paciente->nome_paciente) {
		echo "Usuario ja existe!";
		exit;
		}
	}
	

	
	$node = $xml->addChild("paciente");
	$node->addChild("senha", $_POST["senha"]);
	$node->addChild("nome_paciente", $_POST["nome_paciente"]);
	$node->addChild("email", $_POST["email_paciente"]);
	$node->addChild("idade" , $_POST["idade"]);
	$node->addChild("planosaude" , $_POST["ps_paciente"]);
	$node->addChild("CPF" , $_POST["CPF"]);
	$node->addChild("genero" , $_POST["genero"]);
	
	$s = simplexml_import_dom($xml);
	$s->saveXML('bd_paciente.xml');


}

?>