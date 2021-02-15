<?php
	if ( isset($_GET["flag"]) )
	{
		if ( $_GET["flag"] == 0 )
			$msg = "login invalido";
		print ( "<script language='javascript'>window.alert('" . $msg . "');</script>" );
	}
?>
<form class = "form" action ='login.php' name ='login' method = 'post'>
    <div class="form-group">
        <label >CNPJ</label>
        <input type="text" class="form-control" name = "CNPJ"  >
    </div>
    <div class="form-group">
        <label >CPF</label>
        <input type="text" class="form-control" name = "CPF" >
    </div>
        <button type="submit" class="btn btn-primary" value = 'Cadastrar'>Submit</button>
</form>