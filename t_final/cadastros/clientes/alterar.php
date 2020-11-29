<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update clientes set NomeCompanhia = :NomeCompanhia,
        NomeContato = :NomeContato, TituloContato = :TituloContato, Endereco = :Endereco,
        Cidade = :Cidade, Regiao = :Regiao, CEP = :CEP, Pais = :Pais, Telefone = :Telefone,
        Fax = :Fax
        where IDCliente = :IDCliente");
        $stmt->execute(array(
            'NomeCompanhia'   => $_POST['NomeCompanhia'],
            'IDCliente'       => $_GET['IDCliente'],
            'NomeContato'     => $_POST["NomeContato"],
            'TituloContato'   => $_POST["TituloContato"],
            'Endereco'        => $_POST["Endereco"],
            'Cidade'          => $_POST["Cidade"],
            'Regiao'          => $_POST["Regiao"],
            'CEP'             => $_POST["CEP"],
            'Pais'            => $_POST["Pais"],
            'Telefone'        => $_POST["Telefone"],
            'Fax'             => $_POST["Fax"]
        ));

        ?>
            <div class="alert alert-success">
                Sucesso! O registro foi atualizado.
            </div>
        <?php
    }catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>

<?php
    if (isset($_GET['IDCliente'])) {
        $stmt = $conn->prepare("select * from clientes where IDCliente = :IDCliente");
        $stmt->bindParam(':IDCliente', $_GET['IDCliente'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $pessoa = $stmt->fetchAll();
?>

<form method="post">
    
    <div class="row">
        
        <div class="col-9">
            <label for="NomeCompanhia" class="form-control-plaintext">Nome da Companhia</label>
            <input type="text" class="form-control" name="NomeCompanhia" value="<?=$pessoa[0]['NomeCompanhia']?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <label for="NomeContato" class="form-control-plaintext">Nome do Contato</label>
            <input type="text" class="form-control" name="NomeContato" value="<?=$pessoa[0]['NomeContato']?>" required>
        </div>
        <div class="col-5">
            <label for="TituloContato" class="form-control-plaintext">Titulo Contato</label>
            <input type="text" class="form-control" name="TituloContato" value="<?=$pessoa[0]['TituloContato']?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="Endereco" class="form-control-plaintext">Endereco</label>
            <input type="text" class="form-control" name="Endereco" value="<?=$pessoa[0]['Endereco']?>" required>
        </div>
        <div class="col-4">
            <label for="Cidade" class="form-control-plaintext">Cidade</label>
            <input type="text" class="form-control" name="Cidade" value="<?=$pessoa[0]['Cidade']?>" required>
        </div>
        <div class="col-4">
            <label for="CEP" class="form-control-plaintext">CEP</label>
            <input type="number" class="form-control" name="CEP" value="<?=$pessoa[0]['CEP']?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="Pais" class="form-control-plaintext">Pais</label>
            <input type="text" class="form-control" name="Pais" value="<?=$pessoa[0]['Pais']?>" required>
        </div>
        <div class="col-4">
            <label for="Telefone" class="form-control-plaintext">Telefone</label>
            <input type="number" class="form-control" name="Telefone" value="<?=$pessoa[0]['Telefone']?>" required>
        </div>
        <div class="col-4">
            <label for="Fax" class="form-control-plaintext">Fax</label>
            <input type="number" class="form-control"  name="Fax" value="<?=$pessoa[0]['Fax']?>" >
        </div>
    </div>
<br>
    <input class="btn btn-primary" type="submit" name="salvar" value="Salvar">
    <hr>
</form>