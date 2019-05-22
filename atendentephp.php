<?php

$nomeP = $_POST["nome_paciente_agenda"];
$nomeM = $_POST["nome_medico_agenda"];
$convenioP = $_POST["convenio_paciente_agenda"];
//$consulta = $_POST["data_consulta"];
$horario = $_POST["horario"];
$especialidade = $_POST["esp"];


$xml = simplexml_load_file('cadastro.xml');
$sml = simplexml_load_file('agenda.xml');

//////////Agendar Consulta////////////////
if(isset($_POST["agendar"])){

	$ano = substr($_POST["data_consulta"], 0, -6); 
	$mes = substr($_POST["data_consulta"], 5, -3);
	$dia = substr($_POST["data_consulta"],-2 );
	
		foreach ($xml->medico as $medico) {
		
				if(($nomeM == $medico->nome_medico) && ($especialidade == $medico->esp) && ($convenioP == $medico->planosaude))// && $ano == $medico->horario->ano && $mes == $medico->horario->mes && $dia == $medico->horario->dia)
				{
							$node = $sml->addChild("consulta");
							$node->addChild("nome_medico", "$nomeM");
							$node->addChild("nome_paciente", "$nomeP");
							$node->addChild("ano", $ano);
							$node->addChild("mes", $mes);
							$node->addChild("dia", $dia);
							$node->addChild("horario", $horario);

							$s = simplexml_import_dom($sml);
							$s->saveXML('agenda.xml');
							echo("Consulta Agendada!");
							break; 
				}		
					else{
					echo("Não foi possível realizar o agendamento");
					}
			
		}
}

///////////////Print Agenda/////////////////
if(isset($_POST["consultar_agenda"])){
	$i=count($sml->consulta);
	$A=0;
		while($A!=$i){

		echo "Medico: " . $sml->consulta[$A]->nome_medico . "<br>";
		echo "Paciente: "  . $sml->consulta[$A]->nome_paciente . "<br>";
		echo "Data: " . $sml->consulta[$A]->ano ."/". $sml->consulta[$A]->mes ."/". $sml->consulta[$A]->dia . "<br>";
		echo "Horario: " . $sml->consulta[$A]->horario . "<br>"."<br>";

		$A++;
		}
}



?>

