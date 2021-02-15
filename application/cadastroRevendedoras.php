<?php

	include_once "../persist/SqlManager.class.php";
	
	$cnpj = utf8_encode($_POST["CNPJrevenda"]);
    $nome = utf8_encode($_POST["nome"]);
	$proprietario = utf8_encode($_POST["CPFproprietario"]);
    $estado = utf8_encode($_POST["estado"]);


	function validar_cnpj($cnpj){
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
		if (strlen($cnpj) != 14)
			return true;

		if (preg_match('/(\d)\1{13}/', $cnpj))
			return true;	
		for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
		{
			$soma += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;

		if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
			return true;
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
		{
			$soma += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		if ($cnpj[13] == ($resto < 2 ? 0 : 11 - $resto)){
			return false;
		}
		else{
			return true;
		}
	}

	function validaCPF($cpf) {
 
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf );
		 
		if (strlen($cpf) != 11) {
			return false;
		}
	
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return false;
		}
	
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
			}
		}
		return true;
	
	}

	
	if ( validar_cnpj($cnpj) == true )
	{
		header('Location: index.php?flag=2&page=registrar');
		exit();
	}
	elseif ( strlen($nome) == 0 || strlen($nome) > 25 )
	{
		header('Location: index.php?flag=3&page=registrar');
		exit();
	}
    elseif ( validaCPF($proprietario) == false)
	{
		header('Location: index.php?flag=4&page=registrar');
		exit();
	}
	elseif ( strlen($estado) != 2 )
	{
		header('Location: index.php?flag=5&page=registrar');
		exit();
    }
	
	
	
	$conn = new SqlManager("connect");


	
	$query = "INSERT INTO revendedoras VALUES ( '" . $cnpj . "' , '" . $nome . "', '" . $proprietario . "', '" . $estado . "')";
    
    $numLinhas = $conn->executeCommand($query);
        
	$conn->closeConnection();
	
	if ( $numLinhas == 1 ){
	header('Location: index.php?flag=1&page=registrar');
	}
	else{
	header('Location: index.php?flag=0&page=registrar');
	}

?>