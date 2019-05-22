<?php



$CRM = $_POST["CRM"];
$senha = $_POST["senha"];
$nome_medico = $_POST["nome_medico"];
$email = $_POST["email"];
$esp = $_POST["especialidade"];
$planodesaude = $_POST["plano_de_saude"];
$horario = $_POST["horario"];

if(isset($_POST["button"])){

	 /* Verifica se ja existe o usuario
	foreach ($xml->medico as $medico) {
		if($_POST["nome_medico"] == $medico->nome_medico) {
		echo "Usuario ja existe!";
		exit;
		}
	}	
	

	$strcon = mysqli_connect('localhost', 'root' , 'admin' , 'Clinica') or die('erro ao conectar!');
	$sql = INSERT INTO medico (CRM, Nome, Email, Especialidade, Senha, PlanoDeSaude)
	VALUES ('$CRM', '$nome_medico', '$email', 'especialidade',  '$senha', '$planodesaude');
	mysqli_query($strcon,$sql) or die ("erro ao cadastrar registro");
	mysqli_close($strcon);
	*/
	echo "cliente cadastrado com sucesso!";




}

?>