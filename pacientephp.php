<?php

session_start();
$_checkbox = $_POST["horarios"];
$a = $_SESSION["login"]; //coloco em $a os dados da sessao..




$sxe = simplexml_load_file('bd_paciente.xml');


/////////CONSULTA CADASTRO/////////////
if(isset($_POST["consulta_cadastro"])){

	foreach($sxe->xpath('//paciente') as $item) { 

	

		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_paciente[contains(.,"'.$a.'")]'); 
		if($v[0]){		
			echo("Nome: "."$item->nome_paciente <br>");
			echo("Email: "."$item->email <br>"); 
			echo("CPF: "."$item->CPF <br>");
			echo("Idade: "."$item->idade <br>");
			echo("Plano de Saude: "."$item->planosaude <br>");
			echo("Genero: "."$item->genero <br>");
		 } 
    
	} 
}

/////////ALTERA CADASTRO//////////////
if(isset($_POST["alterar_cadastro"])){

$novo = $_POST["novo"];
$c = $_POST["campo"];

	foreach($sxe->xpath('//paciente') as $item) { 

	

		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_paciente[contains(.,"'.$a.'")]'); 
		if($v[0]){		
			
			//poderia usar replaceChild (se eu soubesse)
			unset($item->$c);
			$item->addChild("$c","$novo");
			echo "Cadastro atualizado!";
			$s = simplexml_import_dom($sxe);
			$s->saveXML('bd_paciente.xml');
			
		}
			
	} 
}

////////ADICIONA NOVA DATA + HORARIO//////////
if(isset($_POST["alterar_horario"])){
	
	$data = $_POST["data"];
	$ano = substr($_POST["data"], 0, -6); 
	$mes = substr($_POST["data"], 5, -3);
	$dia = substr($_POST["data"],-2 );
	
	foreach($sxe->xpath('//paciente') as $item) { 
	
		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_paciente[contains(.,"'.$a.'")]');

		$y=count($item->horario);
		//echo($y);
		//$y=$y+1;

				if($v[0]){
				
					$item->addChild("horario");
					
					$item->horario[$y]->addChild("ano", $ano);
					$item->horario[$y]->addChild("mes", $mes);
					$item->horario[$y]->addChild("dia", $dia);
					//$item->horario->addAttribute("id", $data);
						foreach($_checkbox as $total){
							unset($item->horario[$y]->$total);
							$item->horario[$y]->addChild("$total","$total");
							$s = simplexml_import_dom($sxe);
							$s->saveXML('bd_paciente.xml');
																				
						}

								
		}		
	
	}
}


//////Consultar Agenda de Consultas/////////
if(isset($_POST["consultar_agenda"])){

	$sml=simplexml_load_file('agenda.xml');

	foreach($sml->xpath('//consulta') as $item) { 

		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_paciente[contains(.,"'.$a.'")]'); 
		if($v[0]){		
			echo "Medico: " . $item->nome_medico . "<br>";
			echo "Paciente: "  . $item->nome_paciente . "<br>";
			echo "Data: " . $item->ano ."/". $item->mes ."/". $item->dia . "<br>";
			echo "Horario: " . $item->horario . "<br>"."<br>";

		}
	 } 
 }