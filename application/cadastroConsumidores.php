<?php

	include_once "../persist/SqlManager.class.php";
	
	$cpf = utf8_encode($_POST["cpf"]);
	$nome = utf8_encode($_POST["nome"]);
	$sobrenome = utf8_encode($_POST["sobrenome"]);
	$cidade = utf8_encode($_POST["cidade"]);
	$estado = utf8_encode($_POST["estado"]);

	if ( strlen($cpf) != 6 )
	{
		header('Location: index.php?flag=2&page=consumidores');
		exit();
	}
	elseif ( strlen($nome) == 0 || strlen($nome) > 15 )
	{
		header('Location: index.php?flag=3&page=consumidores');
		exit();
	}
	elseif ( strlen($sobrenome) == 0 || strlen($sobrenome) > 15 )
	{
		header('Location: index.php?flag=4&page=consumidores');
		exit();
	}
	elseif ( strlen($cidade) > 25 )
	{
		header('Location: index.php?flag=5&page=consumidores');
		exit();
	}
	elseif ( strlen($estado) != 2 )
	{
		header('Location: index.php?flag=6&page=consumidores');
		exit();
	}
	
	$conn = new SqlManager("connect");
	
	$query = "INSERT INTO consumidores VALUES ('" . $cpf . "', '" . $nome . "', '" . $sobrenome . "', '" . $cidade . "', '" . $estado . "')";
	
	$numLinhas = $conn->executeCommand($query);
	
	$conn->closeConnection();
	
	if ( $numLinhas == 1 )
		header('Location: index.php?flag=1&page=consumidores');
	else
		header('Location: index.php?flag=0&page=consumidores');
	
?>