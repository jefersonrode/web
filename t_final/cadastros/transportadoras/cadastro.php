<?php
if (isset($_POST['gravar'])){
    try {
        $stmt = $conn->prepare('INSERT INTO transportadoras (IDTransportadora, NomeConpanhia, Telefone) 
                                VALUES (:IDTransportadora, :NomeConpanhia, :Telefone)');
    
    $stmt->execute(array(
        'IDTransportadora'       => $_POST["IDTransportadora"],
        'NomeConpanhia'          => $_POST["NomeConpanhia"],
        'Telefone'               => $_POST["Telefone"]
    ));
    ?>
    <div class="alert alert-success">
                Sucesso! Registro Salvo.
            </div>
    <?php
    
    } catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>

<label>Cadastro de Transportadora</label>
<hr>


<form method="post">
    <div class="row">
        <div class="col-3">
            <label for="IDTransportadora" class="form-control-plaintext">ID da Transportadora</label>
            <input type="text" class="form-control" name="IDTransportadora" id="IDTransportadora" placeholder="ID Transportadora" required >
        </div>
        <div class="col-9">
            <label for="NomeConpanhia" class="form-control-plaintext">Descrição da Transportadora</label>
            <input type="text" class="form-control" name="NomeConpanhia" id="NomeConpanhia" placeholder="NomeConpanhia" required>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="Telefone" class="form-control-plaintext">Telefone</label>
            <input type="text" class="form-control" name="Telefone" id="Telefone" placeholder="Telefone" required >
        </div>
    </div>
<br>
    <input class="btn btn-primary" type="submit" name="gravar" value="Gravar">
</form>
<hr>
