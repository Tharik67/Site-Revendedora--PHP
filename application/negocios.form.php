
<?php
if ( isset($_GET["flag"]) )
{
    if ( $_GET["flag"] == 0 )
        $msg = "Inserido com sucesso";
    elseif ( $_GET["flag"] == 1 )
        $msg = "Falha ao inserir dados";
    elseif ( $_GET["flag"] == 2 )
        $msg = "CNPJ invalido!";
    elseif ( $_GET["flag"] == 3 )
        $msg = "Nome da revendedora invalido!";
    elseif ( $_GET["flag"] == 4 )
        $msg = "CPF invalido!";
    elseif ( $_GET["flag"] == 5 )
        $msg = "Estado invalido!";
    print ( "<script language='javascript'>window.alert('" . $msg . "');</script>" );
}
?>
<form class = "form" action ='cadastroRevendedoras.php' name ='insereRevendedoras' method = 'post'> 
<div class="form-group">
    <label >CNPJ</label>
    <input type="text" class="form-control" name = 'CNPJrevenda' id="exampleInputEmail1">
</div>
<div class="form-group">
    <label>Nome da revendedora</label>
    <input type="text" class="form-control" name = 'nome' id="exampleInputPassword1">
</div>
<div class="form-group">
    <label >CPF proprietario</label>
    <input type="text" class="form-control" name = 'CPFproprietario' id="exampleInputPassword1">
</div>
<div class="form-group">
    <label >Estado</label>
    <input type="text" class="form-control" name = 'estado' id="exampleInputPassword1">
</div>
    <button type="submit" class="btn btn-primary" value = 'Cadastrar'>Submit</button>
</form>
