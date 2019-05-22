<?php

session_start();
$_checkbox = $_POST["horarios"];
$a = $_SESSION["login"]; //coloco em $a os dados da sessao..



$sxe = simplexml_load_file('cadastro.xml');


/////////CONSULTA CADASTRO/////////////
if(isset($_POST["consulta_cadastro"])){

	foreach($sxe->xpath('//medico') as $item) { 

	

		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_medico[contains(.,"'.$a.'")]'); 

		$y=count($item->horario);
		$i=0;

		if($v[0]){		
			echo("Nome: "."$item->nome_medico <br>");
			echo("Email: "."$item->email <br>"); 
			echo("Especialidade: "."$item->esp <br>");
			echo("Plano de Saude"."$item->planosaude <br><br>");
			echo("HORARIOS:<br>");
			while($i!=$y){
				foreach($item->horario[$i]->ano as $hora){
				echo("$hora <br>");
				}
				foreach($item->horario[$i]->mes as $mes){
				echo("$mes <br>");
				}
				foreach($item->horario[$i]->dia as $dia){
				echo("$dia <br><br>");
				}
				$i++;
			}
		 }	
    
	} 
}

/////////ALTERA CADASTRO//////////////
if(isset($_POST["alterar_cadastro"])){

$novo = $_POST["novo"];
$c = $_POST["campo"];

	foreach($sxe->xpath('//medico') as $item) { 

	

		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_medico[contains(.,"'.$a.'")]'); 
		if($v[0]){		
			
			
			unset($item->$c);
			$item->addChild("$c","$novo");
			echo "Cadastro atualizado!";
			$s = simplexml_import_dom($sxe);
			$s->saveXML('cadastro.xml');
			
		}
			
	} 
}

////////ADICIONA NOVA DATA + HORARIO//////
if(isset($_POST["alterar_horario"])){
	

	//divide os campos da data//
	$data = $_POST["data"];
	$ano = substr($_POST["data"], 0, -6); 
	$mes = substr($_POST["data"], 5, -3);
	$dia = substr($_POST["data"],-2 );

	
	foreach($sxe->xpath('//medico') as $item) { 
	
		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_medico[contains(.,"'.$a.'")]');

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
							$s->saveXML('cadastro.xml');
																				
						}
					
					
					
								
		}		
	
	}
}

//////Consultar Agenda de Consultas/////////
if(isset($_POST["consultar_agenda"])){

	$sml=simplexml_load_file('agenda.xml');

	foreach($sml->xpath('//consulta') as $item) { 

		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_medico[contains(.,"'.$a.'")]'); 
		if($v[0]){		
			echo "Medico: " . $item->nome_medico . "<br>";
			echo "Paciente: "  . $item->nome_paciente . "<br>";
			echo "Data: " . $item->ano ."/". $item->mes ."/". $item->dia . "<br>";
			echo "Horario: " . $item->horario . "<br>"."<br>";

		}
	 } 
 }


//////DELETAR TODAS DATAs/HORARIOs/////////////////
 if(isset($_POST["deletar_data"])){

	foreach($sxe->xpath('//medico') as $item) { 

	

		$row = simplexml_load_string($item->asXML()); 
		$v = $row->xpath('//nome_medico[contains(.,"'.$a.'")]'); 
		
		$y=count($item->horario);
		$i=0;
		if($v[0]){		
			while($i<$y) {

			unset($item->horario[$i]);
			$s = simplexml_import_dom($sxe);
			$s->saveXML('cadastro.xml');
			$i++;
			}
			
			
			
		}
			
	} 
}


?>
